document.addEventListener("DOMContentLoaded", function (event) {
    var options = {
        valueNames: ["title", "pubdate", "author", "publisher"]
    };
    var bookList = new Listjs("books", options);
    if (bookList) {
        bookList.sort("title", {
            order: "asc",
            alphabet: "AＡaａBＢbｂCＣcｃDＤdｄEＥeｅ" +
                "FＦfｆGＧgｇHＨhｈIＩiｉJＪjｊ" +
                "KＫkｋLＬlｌMＭmｍNＮnｎOＯoｏ" +
                "PＰpｐQＱqｑRＲrｒSＳsｓTＴtｔ" +
                "UＵuｕVＶvｖWwＷｗXＸxｘYＹyｙZＺzｚ"
        });
    }
});
