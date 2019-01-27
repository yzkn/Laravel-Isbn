<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 認証で使用

use Illuminate\Support\Facades\Log;

// ログ出力で使用

class CsvController extends Controller
{
    protected $encoding_sjiswin = 'SJIS-win';
    protected $encoding_utf8 = 'UTF-8';
    protected $encodings = 'ASCII,JIS,UTF-8,eucJP-win,SJIS-win';
    protected $eol_before = "\n"; #  protected $eol_before = PHP_EOL;
    protected $eol_after = "\r\n";
    protected $extension_csv = 'csv';
    protected $filename_export = 'out.csv';
    protected $required_header = array('isbn', 'cover', 'title', 'author', 'publisher', 'pubdate', 'series', 'volume');
    protected $export_header = array(
        'summary__isbn',
        // 'onix__RecordReference',
        // 'onix__ProductIdentifier__IDValue',
        'summary__cover',
        'summary__title',
        // 'onix__DescriptiveDetail__TitleDetail__TitleText',
        'summary__author',
        'summary__publisher',
        'summary__pubdate',
        'summary__series',
        'summary__volume'//,
        // 'userid'
    );
    protected $locale_jajp = 'ja_JP.UTF-8';
    protected $mimetype_csv = 'text/csv';
    protected $mimetype_text = 'text/plain';
    protected $name_file = 'file';
    protected $view_csv_import = 'csv.import';

    public function index()
    {
        return view('csv.index');
    }

    public function import()
    {
        Log::info('CsvController::import()');

        $auth_user = Auth::user();
        if ($auth_user === null) {
            return redirect('/login');
        }
        Log::info('auth_user: ' . $auth_user->id);

        $param = ['user' => $auth_user];
        return view($this->view_csv_import, $param);
    }

    public function store(Request $request)
    {
        Log::info('CsvController::store()');

        $auth_user = Auth::user();
        if ($auth_user === null) {
            return redirect('/login');
        }
        Log::info('auth_user: ' . $auth_user->id);

        $param = ['user' => $auth_user];

        if (!$request->hasFile($this->name_file)) {
            return view($this->view_csv_import, $param);
        }

        setlocale(LC_ALL, $this->locale_jajp);

        $uploaded_file = $request->file($this->name_file);

        if (!$uploaded_file->isValid()) {
            return view($this->view_csv_import, $param);
        }

        if ($uploaded_file->getMimeType() !== $this->mimetype_text) {
            return view($this->view_csv_import, $param);
        }

        if ($uploaded_file->getClientOriginalExtension() !== $this->extension_csv) {
            return view($this->view_csv_import, $param);
        }

        if (!$uploaded_file->getClientSize() > 0) {
            return view($this->view_csv_import, $param);
        }

        $filepath = $uploaded_file->getRealPath();
        $file = new \SplFileObject($filepath); // SqlFileObjectには"\"を付けて呼び出す
        $file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        // ヘッダー検証用にデータベースから列を取得
        //

        // CSVファイルの読み込み
        $row_count = 1;
        foreach ($file as $row) {
            if ($row_count == 1) {
                // ヘッダー行を読み込んで、項目名や列数が正しいか確認

                // 文字コード
                // if(mb_detect_encoding(implode($row)) !== $this->encoding_utf8)
                //     return;

                // ヘッダー
                $csv_header = array();
                foreach ($row as $value) {
                    $csv_header[] = $value;
                }
                if ($this->required_header !== $csv_header) {
                    return view($this->view_csv_import, $param);
                }
            } else {
                // データ行を読み込む

                if (count($row) !== count($csv_header)) {
                    return view($this->view_csv_import, $param);
                }

                $row_utf8 = array();
                foreach ($row as $item) {
                    $row_utf8[] = mb_convert_encoding($item, $this->encoding_utf8, $this->encodings);
                }

                // insert
                $book = new Book();

                // ISBN
                $book->summary__isbn = $row_utf8[0];
                $book->onix__RecordReference = $row_utf8[0];
                $book->onix__ProductIdentifier__IDValue = $row_utf8[0];
                //

                $book->summary__cover = $row_utf8[1];

                // Title
                $book->summary__title = $row_utf8[2];
                $book->onix__DescriptiveDetail__TitleDetail__TitleText = $row_utf8[2];
                //

                $book->summary__author = $row_utf8[3];
                $book->summary__publisher = $row_utf8[4];
                $book->summary__pubdate = $row_utf8[5];
                $book->summary__series = $row_utf8[6];
                $book->summary__volume = $row_utf8[7];
                $book->userid = $user->id;
                $book->save();

                Log::info('book: ' . implode(";", $book));
            }
            $row_count++;
        }

        return redirect('/book');
    }

    public function write()
    {
        $books = Book::get($this->export_header)->toArray();
        array_unshift($books, $this->required_header);
        $stream = fopen('php://output', 'w');
        foreach ($books as $book) {
            fputcsv($stream, $book);
        }
        $headers = array(
            'Content-Type' => $this->mimetype_csv,
            'Content-Disposition' => 'attachment; filename="'.$this->filename_export.'"',
        );
        return \Response::make('', 200, $headers);
    }
}
