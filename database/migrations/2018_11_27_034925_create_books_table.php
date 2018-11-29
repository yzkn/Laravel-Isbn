<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // https://openbd.jp/spec/
            $table->string('onix/RecordReference', 13); // ISBNコード
            $table->string('onix/ProductIdentifier/IDValue', 13); // ISBNコード
            $table->text('onix/DescriptiveDetail'); // 商品情報
            $table->text('onix/DescriptiveDetail/ProductComposition'); // セット商品分売可否
            $table->text('onix/DescriptiveDetail/ProductFormDetail'); // 判型    コード指定
            $table->text('onix/DescriptiveDetail/Measure'); // 判型(実寸)
            $table->text('onix/DescriptiveDetail/ProductPart'); // 付録情報
            $table->text('onix/DescriptiveDetail/Collection'); // シリーズ物等の情報
            $table->text('onix/DescriptiveDetail/Collection/TitleDetail'); // シリーズ名/レーベル名
            $table->text('onix/DescriptiveDetail/TitleDetail/TitleText'); // 書名
            $table->text('onix/DescriptiveDetail/TitleDetail/Subtitle'); // サブタイトル
            $table->text('onix/DescriptiveDetail/Contributor'); // 著者情報
            $table->text('onix/DescriptiveDetail/Contributor/ContributorRole'); // 著者区分    コード指定
            $table->text('onix/DescriptiveDetail/Contributor/PersonName'); // 著者名
            $table->text('onix/DescriptiveDetail/Contributor/BiographicalNote'); // 著者略歴
            $table->text('onix/DescriptiveDetail/Language'); // 言語
            $table->text('onix/DescriptiveDetail/Extent'); // ページ数
            $table->text('onix/DescriptiveDetail/Subject'); // Cコード/ジャンルコード/キーワード
            $table->text('onix/DescriptiveDetail/Audience'); // 読者対象/成人指定
            $table->text('onix/CollateralDetail'); // 商品付帯項目
            $table->text('onix/CollateralDetail/TextContent'); // 内容紹介/目次
            $table->text('onix/CollateralDetail/SupportingResource'); // 画像    3枚まで
            $table->text('onix/CollateralDetail/SupportingResource/ResourceLink'); // 画像パス
            $table->text('onix/PublishingDetail'); // 出版社情報
            $table->text('onix/PublishingDetail/Imprint'); // 発行元出版社
            $table->text('onix/PublishingDetail/Publisher'); // 発売元出版社
            $table->text('onix/PublishingDetail/PublishingDate'); // 発売予定日等
            $table->text('onix/PublishingDetailProductSupply'); // 出版状況等
            $table->text('onix/PublishingDetail/ReturnsConditions'); // 販売条件
            $table->text('onix/PublishingDetail/Price'); // 価格情報

            $table->text('hanmoto/dateshuppan'); // 出版年月日    年のみ、年月のみの場合あり
            $table->text('hanmoto/datemodified'); // 情報更新日時
            $table->text('hanmoto/datecreated'); // 情報作成日時
            $table->text('hanmoto/lanove'); // ライトノベルフラグ
            $table->text('hanmoto/hasshohyo'); // 書評データありフラグ
            $table->text('hanmoto/hastameshiyomi'); // ためしよみありフラグ
            $table->text('hanmoto/reviews'); // 書評情報    (複数レコード可)
            $table->text('hanmoto/reviews/appearance'); // 掲載日
            $table->text('hanmoto/reviews/reviewer'); // 書評者
            $table->text('hanmoto/reviews/source_id'); // 掲載元ID    別テーブル
            $table->text('hanmoto/reviews/kubun_id'); // 掲載元区分ID    別テーブル
            $table->text('hanmoto/reviews/source'); // 掲載元
            $table->text('hanmoto/reviews/choyukan'); // 朝刊/夕刊
            $table->text('hanmoto/reviews/han'); // 版数
            $table->text('hanmoto/reviews/link'); // リンク
            $table->text('hanmoto/reviews/post_user'); // 入力者

            $table->text('hanmoto/genshomei'); // 原書名
            $table->text('hanmoto/han'); // 版    新版、改訂などの版次(エディション)
            $table->text('hanmoto/datejuuhanyotei'); // 重版予定日
            $table->text('hanmoto/datezeppan'); // 絶版日
            $table->text('hanmoto/toji'); // 製本    上製="上製",並製="並製"
            $table->text('hanmoto/zaiko'); // 在庫    在庫あり=11／在庫僅少=21／重版中=22／品切れ・重版未定=33／絶版=34
            $table->text('hanmoto/maegakinado'); // まえがきなど
            $table->text('hanmoto/hanmotokarahitokoto'); // 版元からひとこと
            $table->text('hanmoto/kaisetsu105w'); // 内容紹介TRC(105字)    TRC(図書館流通センター)のストックブックなどの選択用
            $table->text('hanmoto/kanrensho'); // 関連書
            $table->text('hanmoto/kanrenLink'); // 関連リンク    htmlで記入
            $table->text('hanmoto/tsuiki'); // サイト追記    htmlで記入
            $table->text('hanmoto/genrecodetrc'); // ジャンルコード(TRC)
            $table->text('hanmoto/genrecodetrcjidou'); // ジャンルコード(TRC児童書)
            $table->text('hanmoto/rubynoumu'); // ルビの有無
            $table->text('hanmoto/ndccode'); // NDCコード
            $table->text('hanmoto/kankoukeitai'); // 刊行形態
            $table->text('hanmoto/sonotatokkijikou'); // その他特記事項
            $table->text('hanmoto/jushoujouhou'); // 受賞情報
            $table->text('hanmoto/furoku'); // 付録    なし="",切り離し式=1,別冊=2
            $table->text('hanmoto/furokusonota'); // 付録その他
            $table->text('hanmoto/dokushakakikomi'); // 読者書き込み
            $table->text('hanmoto/dokushakakikomipagesuu'); // 読者書き込みページ数
            $table->text('hanmoto/fuzokushiryounokangaikashidashi'); // 付属資料館外貸出    可=1,不可=2,館内のみ=3
            $table->text('hanmoto/obinaiyou'); // 帯内容
            $table->text('hanmoto/ruishokyougousho'); // 類書・競合書
            $table->text('hanmoto/bessoushiryou'); // 別送資料
            $table->text('hanmoto/zasshicode'); // 雑誌コード
            $table->text('hanmoto/bikoujpo'); // 備考(JPO)
            $table->text('hanmoto/bikoutrc'); // 備考(TRC)
            $table->text('hanmoto/kanrenshoisbn'); // 関連書ISBN
            $table->text('hanmoto/author'); // 独自著者情報    (複数レコード可)
            $table->text('hanmoto/author/listseq'); // リスト順(onixデータに対応)
            $table->text('hanmoto/author/dokujikubun'); // 独自著者区分
            $table->text('hanmoto/jyuhan'); // 重版情報    (複数レコード可)
            $table->text('hanmoto/jyuhan/date'); // 重版日
            $table->text('hanmoto/jyuhan/suri'); // 刷り数    数値
            $table->text('hanmoto/jyuhan/comment'); // 重版コメント
            $table->text('hanmoto/jyuhan/ctime'); // レコード作成日時

            $table->string('summary/isbn', 13);
            $table->text('summary/title');
            $table->text('summary/volume');
            $table->text('summary/series');
            $table->text('summary/publisher');
            $table->text('summary/pubdate');
            $table->text('summary/cover');
            $table->text('summary/author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
