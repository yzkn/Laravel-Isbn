<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::all();
        $books = Book::latest()->get();
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (strlen(Request::input('isbn')) != 0) {
            $isbn = Request::input('isbn');
        } else if (strlen(Request::input('summary__isbn')) != 0) {
            $isbn = Request::input('summary__isbn');
        } else {
            $isbn = '';
        }

        return view('book.create', ['isbn' => $isbn]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $isbn = $request->summary__isbn;
        $isbn = str_replace('-', '', $isbn);
        $isbn = str_replace(' ', '', $isbn);

        $book = new Book;
        $book->summary__isbn = $isbn;
        $book->onix__RecordReference = $isbn;
        $book->onix__ProductIdentifier__IDValue = $isbn;
        $book->summary__cover = $request->summary__cover;
        $book->summary__title = $request->summary__title;
        $book->onix__DescriptiveDetail__TitleDetail__TitleText = $request->summary__title;
        $book->summary__author = $request->summary__author;
        $book->summary__publisher = $request->summary__publisher;
        $book->summary__pubdate = $request->summary__pubdate;
        $book->summary__series = $request->summary__series;
        $book->summary__volume = $request->summary__volume;
        $book->userid = $user->id;
        $book->save();
        return redirect('books/' . $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $book = Book::find($id);
        if (isset($book)) {
            if ($user->id === $book->userid) {
                return view('book.edit', ['book' => $book]);
            }
        }
        return redirect('/books');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $book = Book::find($id);
        if (isset($book)) {
            $book->fill($request->all());
            $book->userid = $user->id;
            $book->save();
            return redirect('books/' . $book->id);
        }
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (isset($book)) {
            $book->delete();
        }
        return redirect('/books');
    }

    public function bd($isbn)
    {
        $url = 'https://api.openbd.jp/v1/get?isbn=' . $isbn;
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        return json_decode($json);
    }

    public function ndl($isbn)
    {
        $url = 'http://iss.ndl.go.jp/api/sru?operation=searchRetrieve&query=isbn=' . $isbn;
        $xml = file_get_contents($url);
        $xml = mb_convert_encoding($xml, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $xml = html_entity_decode($xml, ENT_QUOTES);

        $json = xml2json($xml);

        return $json;
    }
}

function xml2json($xml)
{
    // 名前空間が記述されているxmlファイルをそのまま読み込むと、当該タグのデータが欠落する
    $xml = preg_replace("/<([^>]+?):([^>]+?)>/", "<$1_$2>", $xml);
    $xml = preg_replace("/_\/\//", "://", $xml);
    $objXml = simplexml_load_string($xml, null, LIBXML_NOCDATA);
    xml2jsonsub($objXml);
    $json = json_encode($objXml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return preg_replace('/\\\\\//', '/', $json);
}

function xml2jsonsub($node)
{
    if ($node->count() > 0) {
        foreach ($node->children() as $child) {
            foreach ($child->attributes() as $key => $val) {
                $node->addChild($child->getName() . "@" . $key, $val);
            }
            xml2jsonsub($child);
        }
    }
}
