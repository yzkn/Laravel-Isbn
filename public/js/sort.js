document.addEventListener("DOMContentLoaded", function (event) {
    if (document.getElementById("books")) {
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
    }

    if (document.getElementById("series")) {
        var options = {
            valueNames: ["series"]
        };
        var seriesList = new Listjs("series", options);
        if (seriesList) {
            seriesList.sort("series", {
                order: "asc",
                alphabet: "AＡaａBＢbｂCＣcｃDＤdｄEＥeｅ" +
                    "FＦfｆGＧgｇHＨhｈIＩiｉJＪjｊ" +
                    "KＫkｋLＬlｌMＭmｍNＮnｎOＯoｏ" +
                    "PＰpｐQＱqｑRＲrｒSＳsｓTＴtｔ" +
                    "UＵuｕVＶvｖWwＷｗXＸxｘYＹyｙZＺzｚ"
            });
        }
    }
});
