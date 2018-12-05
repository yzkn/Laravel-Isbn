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
            $table->string('onix__RecordReference', 13); // ISBNコード
            $table->string('onix__ProductIdentifier__IDValue', 13); // ISBNコード
            $table->text('onix__DescriptiveDetail')->nullable($value = true); // 商品情報
            $table->text('onix__DescriptiveDetail__ProductComposition')->nullable($value = true); // セット商品分売可否
            $table->text('onix__DescriptiveDetail__ProductFormDetail')->nullable($value = true); // 判型    コード指定
            $table->text('onix__DescriptiveDetail__Measure')->nullable($value = true); // 判型(実寸)
            $table->text('onix__DescriptiveDetail__ProductPart')->nullable($value = true); // 付録情報
            $table->text('onix__DescriptiveDetail__Collection')->nullable($value = true); // シリーズ物等の情報
            $table->text('onix__DescriptiveDetail__Collection__TitleDetail')->nullable($value = true); // シリーズ名/レーベル名
            $table->text('onix__DescriptiveDetail__TitleDetail__TitleText'); // 書名
            $table->text('onix__DescriptiveDetail__TitleDetail__Subtitle')->nullable($value = true); // サブタイトル
            $table->text('onix__DescriptiveDetail__Contributor')->nullable($value = true); // 著者情報
            $table->text('onix__DescriptiveDetail__Contributor__ContributorRole')->nullable($value = true); // 著者区分    コード指定
            $table->text('onix__DescriptiveDetail__Contributor__PersonName')->nullable($value = true); // 著者名
            $table->text('onix__DescriptiveDetail__Contributor__BiographicalNote')->nullable($value = true); // 著者略歴
            $table->text('onix__DescriptiveDetail__Language')->nullable($value = true); // 言語
            $table->text('onix__DescriptiveDetail__Extent')->nullable($value = true); // ページ数
            $table->text('onix__DescriptiveDetail__Subject')->nullable($value = true); // Cコード/ジャンルコード/キーワード
            $table->text('onix__DescriptiveDetail__Audience')->nullable($value = true); // 読者対象/成人指定
            $table->text('onix__CollateralDetail')->nullable($value = true); // 商品付帯項目
            $table->text('onix__CollateralDetail__TextContent')->nullable($value = true); // 内容紹介/目次
            $table->text('onix__CollateralDetail__SupportingResource')->nullable($value = true); // 画像    3枚まで
            $table->text('onix__CollateralDetail__SupportingResource__ResourceLink')->nullable($value = true); // 画像パス
            $table->text('onix__PublishingDetail')->nullable($value = true); // 出版社情報
            $table->text('onix__PublishingDetail__Imprint')->nullable($value = true); // 発行元出版社
            $table->text('onix__PublishingDetail__Publisher')->nullable($value = true); // 発売元出版社
            $table->text('onix__PublishingDetail__PublishingDate')->nullable($value = true); // 発売予定日等
            $table->text('onix__PublishingDetailProductSupply')->nullable($value = true); // 出版状況等
            $table->text('onix__PublishingDetail__ReturnsConditions')->nullable($value = true); // 販売条件
            $table->text('onix__PublishingDetail__Price')->nullable($value = true); // 価格情報

            $table->text('hanmoto__dateshuppan')->nullable($value = true); // 出版年月日    年のみ、年月のみの場合あり
            $table->text('hanmoto__datemodified')->nullable($value = true); // 情報更新日時
            $table->text('hanmoto__datecreated')->nullable($value = true); // 情報作成日時
            $table->text('hanmoto__lanove')->nullable($value = true); // ライトノベルフラグ
            $table->text('hanmoto__hasshohyo')->nullable($value = true); // 書評データありフラグ
            $table->text('hanmoto__hastameshiyomi')->nullable($value = true); // ためしよみありフラグ
            $table->text('hanmoto__reviews')->nullable($value = true); // 書評情報    (複数レコード可)
            $table->text('hanmoto__reviews__appearance')->nullable($value = true); // 掲載日
            $table->text('hanmoto__reviews__reviewer')->nullable($value = true); // 書評者
            $table->text('hanmoto__reviews__source_id')->nullable($value = true); // 掲載元ID    別テーブル
            $table->text('hanmoto__reviews__kubun_id')->nullable($value = true); // 掲載元区分ID    別テーブル
            $table->text('hanmoto__reviews__source')->nullable($value = true); // 掲載元
            $table->text('hanmoto__reviews__choyukan')->nullable($value = true); // 朝刊/夕刊
            $table->text('hanmoto__reviews__han')->nullable($value = true); // 版数
            $table->text('hanmoto__reviews__link')->nullable($value = true); // リンク
            $table->text('hanmoto__reviews__post_user')->nullable($value = true); // 入力者

            $table->text('hanmoto__genshomei')->nullable($value = true); // 原書名
            $table->text('hanmoto__han')->nullable($value = true); // 版    新版、改訂などの版次(エディション)
            $table->text('hanmoto__datejuuhanyotei')->nullable($value = true); // 重版予定日
            $table->text('hanmoto__datezeppan')->nullable($value = true); // 絶版日
            $table->text('hanmoto__toji')->nullable($value = true); // 製本    上製="上製",並製="並製"
            $table->text('hanmoto__zaiko')->nullable($value = true); // 在庫    在庫あり=11／在庫僅少=21／重版中=22／品切れ・重版未定=33／絶版=34
            $table->text('hanmoto__maegakinado')->nullable($value = true); // まえがきなど
            $table->text('hanmoto__hanmotokarahitokoto')->nullable($value = true); // 版元からひとこと
            $table->text('hanmoto__kaisetsu105w')->nullable($value = true); // 内容紹介TRC(105字)    TRC(図書館流通センター)のストックブックなどの選択用
            $table->text('hanmoto__kanrensho')->nullable($value = true); // 関連書
            $table->text('hanmoto__kanrenLink')->nullable($value = true); // 関連リンク    htmlで記入
            $table->text('hanmoto__tsuiki')->nullable($value = true); // サイト追記    htmlで記入
            $table->text('hanmoto__genrecodetrc')->nullable($value = true); // ジャンルコード(TRC)
            $table->text('hanmoto__genrecodetrcjidou')->nullable($value = true); // ジャンルコード(TRC児童書)
            $table->text('hanmoto__rubynoumu')->nullable($value = true); // ルビの有無
            $table->text('hanmoto__ndccode')->nullable($value = true); // NDCコード
            $table->text('hanmoto__kankoukeitai')->nullable($value = true); // 刊行形態
            $table->text('hanmoto__sonotatokkijikou')->nullable($value = true); // その他特記事項
            $table->text('hanmoto__jushoujouhou')->nullable($value = true); // 受賞情報
            $table->text('hanmoto__furoku')->nullable($value = true); // 付録    なし="",切り離し式=1,別冊=2
            $table->text('hanmoto__furokusonota')->nullable($value = true); // 付録その他
            $table->text('hanmoto__dokushakakikomi')->nullable($value = true); // 読者書き込み
            $table->text('hanmoto__dokushakakikomipagesuu')->nullable($value = true); // 読者書き込みページ数
            $table->text('hanmoto__fuzokushiryounokangaikashidashi')->nullable($value = true); // 付属資料館外貸出    可=1,不可=2,館内のみ=3
            $table->text('hanmoto__obinaiyou')->nullable($value = true); // 帯内容
            $table->text('hanmoto__ruishokyougousho')->nullable($value = true); // 類書・競合書
            $table->text('hanmoto__bessoushiryou')->nullable($value = true); // 別送資料
            $table->text('hanmoto__zasshicode')->nullable($value = true); // 雑誌コード
            $table->text('hanmoto__bikoujpo')->nullable($value = true); // 備考(JPO)
            $table->text('hanmoto__bikoutrc')->nullable($value = true); // 備考(TRC)
            $table->text('hanmoto__kanrenshoisbn')->nullable($value = true); // 関連書ISBN
            $table->text('hanmoto__author')->nullable($value = true); // 独自著者情報    (複数レコード可)
            $table->text('hanmoto__author__listseq')->nullable($value = true); // リスト順(onixデータに対応)
            $table->text('hanmoto__author__dokujikubun')->nullable($value = true); // 独自著者区分
            $table->text('hanmoto__jyuhan')->nullable($value = true); // 重版情報    (複数レコード可)
            $table->text('hanmoto__jyuhan__date')->nullable($value = true); // 重版日
            $table->text('hanmoto__jyuhan__suri')->nullable($value = true); // 刷り数    数値
            $table->text('hanmoto__jyuhan__comment')->nullable($value = true); // 重版コメント
            $table->text('hanmoto__jyuhan__ctime')->nullable($value = true); // レコード作成日時

            $table->string('summary__isbn', 13);
            $table->text('summary__title');
            $table->text('summary__volume')->nullable($value = true);
            $table->text('summary__series')->nullable($value = true);
            $table->text('summary__publisher')->nullable($value = true);
            $table->text('summary__pubdate')->nullable($value = true);
            $table->text('summary__cover')->nullable($value = true);
            $table->text('summary__author')->nullable($value = true);

            $table->integer('userid');
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
