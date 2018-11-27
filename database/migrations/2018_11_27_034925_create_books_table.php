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

/*
// https://openbd.jp/spec/

RecordReference    ISBNコード
ProductIdentifier/IDValue    ISBNコード
DescriptiveDetail    商品情報
　/ProductComposition    セット商品分売可否
　/ProductFormDetail    判型    コード指定
　/Measure    判型(実寸)
　/ProductPart    付録情報
　/Collection    シリーズ物等の情報
　　/Collection/TitleDetail    シリーズ名/レーベル名
　/TitleDetail/TitleText    書名
　/TitleDetail/Subtitle    サブタイトル
　/Contributor    著者情報
　　/Contributor/ContributorRole    著者区分    コード指定
　　/Contributor/PersonName    著者名
　　/Contributor/BiographicalNote    著者略歴
　/Language    言語
　/Extent    ページ数
　/Subject    Cコード/ジャンルコード/キーワード
　/Audience    読者対象/成人指定
CollateralDetail    商品付帯項目
　/TextContent    内容紹介/目次
　/SupportingResource    画像    3枚まで
　　/SupportingResource/ResourceLink    画像パス
PublishingDetail    出版社情報
　/Imprint    発行元出版社
　/Publisher    発売元出版社
　/PublishingDate    発売予定日等
ProductSupply    出版状況等
　/ReturnsConditions    販売条件
　/Price    価格情報

dateshuppan    出版年月日    年のみ、年月のみの場合あり
datemodified    情報更新日時
datecreated    情報作成日時
lanove    ライトノベルフラグ
hasshohyo    書評データありフラグ
hastameshiyomi    ためしよみありフラグ
reviews    書評情報    (複数レコード可)
　/appearance    掲載日
　/reviewer    書評者
　/source_id    掲載元ID    別テーブル
　/kubun_id    掲載元区分ID    別テーブル
　/source    掲載元
　/choyukan    朝刊/夕刊
　/han    版数
　/link    リンク
　/post_user    入力者

genshomei    原書名
han    版    新版、改訂などの版次(エディション)
datejuuhanyotei    重版予定日
datezeppan    絶版日
toji    製本    上製="上製",並製="並製"
zaiko    在庫    在庫あり=11／在庫僅少=21／重版中=22／品切れ・重版未定=33／絶版=34
maegakinado    まえがきなど
hanmotokarahitokoto    版元からひとこと
kaisetsu105w    内容紹介TRC(105字)    TRC(図書館流通センター)のストックブックなどの選択用
kanrensho    関連書
kanrenLink    関連リンク    htmlで記入
tsuiki    サイト追記    htmlで記入
genrecodetrc    ジャンルコード(TRC)
genrecodetrcjidou    ジャンルコード(TRC児童書)
rubynoumu    ルビの有無
ndccode    NDCコード
kankoukeitai    刊行形態
sonotatokkijikou    その他特記事項
jushoujouhou    受賞情報
furoku    付録    なし="",切り離し式=1,別冊=2
furokusonota    付録その他
dokushakakikomi    読者書き込み
dokushakakikomipagesuu    読者書き込みページ数
fuzokushiryounokangaikashidashi    付属資料館外貸出    可=1,不可=2,館内のみ=3
obinaiyou    帯内容
ruishokyougousho    類書・競合書
bessoushiryou    別送資料
zasshicode    雑誌コード
bikoujpo    備考(JPO)
bikoutrc    備考(TRC)
kanrenshoisbn    関連書ISBN
author    独自著者情報    (複数レコード可)
author/listseq    リスト順(onixデータに対応)
author/dokujikubun    独自著者区分
jyuhan    重版情報    (複数レコード可)
jyuhan/date    重版日
jyuhan/suri    刷り数    数値
jyuhan/comment    重版コメント
jyuhan/ctime    レコード作成日時
 */

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
