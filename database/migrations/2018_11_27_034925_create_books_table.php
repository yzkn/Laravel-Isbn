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
            $table->text('onix/DescriptiveDetail')->nullable($value = true); // 商品情報
            $table->text('onix/DescriptiveDetail/ProductComposition')->nullable($value = true); // セット商品分売可否
            $table->text('onix/DescriptiveDetail/ProductFormDetail')->nullable($value = true); // 判型    コード指定
            $table->text('onix/DescriptiveDetail/Measure')->nullable($value = true); // 判型(実寸)
            $table->text('onix/DescriptiveDetail/ProductPart')->nullable($value = true); // 付録情報
            $table->text('onix/DescriptiveDetail/Collection')->nullable($value = true); // シリーズ物等の情報
            $table->text('onix/DescriptiveDetail/Collection/TitleDetail')->nullable($value = true); // シリーズ名/レーベル名
            $table->text('onix/DescriptiveDetail/TitleDetail/TitleText'); // 書名
            $table->text('onix/DescriptiveDetail/TitleDetail/Subtitle')->nullable($value = true); // サブタイトル
            $table->text('onix/DescriptiveDetail/Contributor')->nullable($value = true); // 著者情報
            $table->text('onix/DescriptiveDetail/Contributor/ContributorRole')->nullable($value = true); // 著者区分    コード指定
            $table->text('onix/DescriptiveDetail/Contributor/PersonName')->nullable($value = true); // 著者名
            $table->text('onix/DescriptiveDetail/Contributor/BiographicalNote')->nullable($value = true); // 著者略歴
            $table->text('onix/DescriptiveDetail/Language')->nullable($value = true); // 言語
            $table->text('onix/DescriptiveDetail/Extent')->nullable($value = true); // ページ数
            $table->text('onix/DescriptiveDetail/Subject')->nullable($value = true); // Cコード/ジャンルコード/キーワード
            $table->text('onix/DescriptiveDetail/Audience')->nullable($value = true); // 読者対象/成人指定
            $table->text('onix/CollateralDetail')->nullable($value = true); // 商品付帯項目
            $table->text('onix/CollateralDetail/TextContent')->nullable($value = true); // 内容紹介/目次
            $table->text('onix/CollateralDetail/SupportingResource')->nullable($value = true); // 画像    3枚まで
            $table->text('onix/CollateralDetail/SupportingResource/ResourceLink')->nullable($value = true); // 画像パス
            $table->text('onix/PublishingDetail')->nullable($value = true); // 出版社情報
            $table->text('onix/PublishingDetail/Imprint')->nullable($value = true); // 発行元出版社
            $table->text('onix/PublishingDetail/Publisher')->nullable($value = true); // 発売元出版社
            $table->text('onix/PublishingDetail/PublishingDate')->nullable($value = true); // 発売予定日等
            $table->text('onix/PublishingDetailProductSupply')->nullable($value = true); // 出版状況等
            $table->text('onix/PublishingDetail/ReturnsConditions')->nullable($value = true); // 販売条件
            $table->text('onix/PublishingDetail/Price')->nullable($value = true); // 価格情報

            $table->text('hanmoto/dateshuppan')->nullable($value = true); // 出版年月日    年のみ、年月のみの場合あり
            $table->text('hanmoto/datemodified')->nullable($value = true); // 情報更新日時
            $table->text('hanmoto/datecreated')->nullable($value = true); // 情報作成日時
            $table->text('hanmoto/lanove')->nullable($value = true); // ライトノベルフラグ
            $table->text('hanmoto/hasshohyo')->nullable($value = true); // 書評データありフラグ
            $table->text('hanmoto/hastameshiyomi')->nullable($value = true); // ためしよみありフラグ
            $table->text('hanmoto/reviews')->nullable($value = true); // 書評情報    (複数レコード可)
            $table->text('hanmoto/reviews/appearance')->nullable($value = true); // 掲載日
            $table->text('hanmoto/reviews/reviewer')->nullable($value = true); // 書評者
            $table->text('hanmoto/reviews/source_id')->nullable($value = true); // 掲載元ID    別テーブル
            $table->text('hanmoto/reviews/kubun_id')->nullable($value = true); // 掲載元区分ID    別テーブル
            $table->text('hanmoto/reviews/source')->nullable($value = true); // 掲載元
            $table->text('hanmoto/reviews/choyukan')->nullable($value = true); // 朝刊/夕刊
            $table->text('hanmoto/reviews/han')->nullable($value = true); // 版数
            $table->text('hanmoto/reviews/link')->nullable($value = true); // リンク
            $table->text('hanmoto/reviews/post_user')->nullable($value = true); // 入力者

            $table->text('hanmoto/genshomei')->nullable($value = true); // 原書名
            $table->text('hanmoto/han')->nullable($value = true); // 版    新版、改訂などの版次(エディション)
            $table->text('hanmoto/datejuuhanyotei')->nullable($value = true); // 重版予定日
            $table->text('hanmoto/datezeppan')->nullable($value = true); // 絶版日
            $table->text('hanmoto/toji')->nullable($value = true); // 製本    上製="上製",並製="並製"
            $table->text('hanmoto/zaiko')->nullable($value = true); // 在庫    在庫あり=11／在庫僅少=21／重版中=22／品切れ・重版未定=33／絶版=34
            $table->text('hanmoto/maegakinado')->nullable($value = true); // まえがきなど
            $table->text('hanmoto/hanmotokarahitokoto')->nullable($value = true); // 版元からひとこと
            $table->text('hanmoto/kaisetsu105w')->nullable($value = true); // 内容紹介TRC(105字)    TRC(図書館流通センター)のストックブックなどの選択用
            $table->text('hanmoto/kanrensho')->nullable($value = true); // 関連書
            $table->text('hanmoto/kanrenLink')->nullable($value = true); // 関連リンク    htmlで記入
            $table->text('hanmoto/tsuiki')->nullable($value = true); // サイト追記    htmlで記入
            $table->text('hanmoto/genrecodetrc')->nullable($value = true); // ジャンルコード(TRC)
            $table->text('hanmoto/genrecodetrcjidou')->nullable($value = true); // ジャンルコード(TRC児童書)
            $table->text('hanmoto/rubynoumu')->nullable($value = true); // ルビの有無
            $table->text('hanmoto/ndccode')->nullable($value = true); // NDCコード
            $table->text('hanmoto/kankoukeitai')->nullable($value = true); // 刊行形態
            $table->text('hanmoto/sonotatokkijikou')->nullable($value = true); // その他特記事項
            $table->text('hanmoto/jushoujouhou')->nullable($value = true); // 受賞情報
            $table->text('hanmoto/furoku')->nullable($value = true); // 付録    なし="",切り離し式=1,別冊=2
            $table->text('hanmoto/furokusonota')->nullable($value = true); // 付録その他
            $table->text('hanmoto/dokushakakikomi')->nullable($value = true); // 読者書き込み
            $table->text('hanmoto/dokushakakikomipagesuu')->nullable($value = true); // 読者書き込みページ数
            $table->text('hanmoto/fuzokushiryounokangaikashidashi')->nullable($value = true); // 付属資料館外貸出    可=1,不可=2,館内のみ=3
            $table->text('hanmoto/obinaiyou')->nullable($value = true); // 帯内容
            $table->text('hanmoto/ruishokyougousho')->nullable($value = true); // 類書・競合書
            $table->text('hanmoto/bessoushiryou')->nullable($value = true); // 別送資料
            $table->text('hanmoto/zasshicode')->nullable($value = true); // 雑誌コード
            $table->text('hanmoto/bikoujpo')->nullable($value = true); // 備考(JPO)
            $table->text('hanmoto/bikoutrc')->nullable($value = true); // 備考(TRC)
            $table->text('hanmoto/kanrenshoisbn')->nullable($value = true); // 関連書ISBN
            $table->text('hanmoto/author')->nullable($value = true); // 独自著者情報    (複数レコード可)
            $table->text('hanmoto/author/listseq')->nullable($value = true); // リスト順(onixデータに対応)
            $table->text('hanmoto/author/dokujikubun')->nullable($value = true); // 独自著者区分
            $table->text('hanmoto/jyuhan')->nullable($value = true); // 重版情報    (複数レコード可)
            $table->text('hanmoto/jyuhan/date')->nullable($value = true); // 重版日
            $table->text('hanmoto/jyuhan/suri')->nullable($value = true); // 刷り数    数値
            $table->text('hanmoto/jyuhan/comment')->nullable($value = true); // 重版コメント
            $table->text('hanmoto/jyuhan/ctime')->nullable($value = true); // レコード作成日時

            $table->string('summary/isbn', 13);
            $table->text('summary/title');
            $table->text('summary/volume')->nullable($value = true);
            $table->text('summary/series')->nullable($value = true);
            $table->text('summary/publisher')->nullable($value = true);
            $table->text('summary/pubdate')->nullable($value = true);
            $table->text('summary/cover')->nullable($value = true);
            $table->text('summary/author')->nullable($value = true);
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
