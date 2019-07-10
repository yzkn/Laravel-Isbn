// Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.

document.addEventListener("DOMContentLoaded", function(event) {
    if (document.getElementById("books")) {
        var options = {
            valueNames: ["title", "pubdate", "author", "publisher"]
        };
        var bookList = new Listjs("books", options);
        // if (bookList) {
        //     bookList.sort("title", {
        //         order: "asc",
        //         alphabet: "AＡaａBＢbｂCＣcｃDＤdｄEＥeｅ" +
        //             "FＦfｆGＧgｇHＨhｈIＩiｉJＪjｊ" +
        //             "KＫkｋLＬlｌMＭmｍNＮnｎOＯoｏ" +
        //             "PＰpｐQＱqｑRＲrｒSＳsｓTＴtｔ" +
        //             "UＵuｕVＶvｖWwＷｗXＸxｘYＹyｙZＺzｚ"
        //     });
        // }
    }

    if (document.getElementById("series")) {
        var options = {
            valueNames: ["series"]
        };
        var seriesList = new Listjs("series", options);
        // if (seriesList) {
        //     seriesList.sort("series", {
        //         order: "asc",
        //         alphabet: "AＡaａBＢbｂCＣcｃDＤdｄEＥeｅ" +
        //             "FＦfｆGＧgｇHＨhｈIＩiｉJＪjｊ" +
        //             "KＫkｋLＬlｌMＭmｍNＮnｎOＯoｏ" +
        //             "PＰpｐQＱqｑRＲrｒSＳsｓTＴtｔ" +
        //             "UＵuｕVＶvｖWwＷｗXＸxｘYＹyｙZＺzｚ"
        //     });
        // }
    }
});

function hide(id) {
    var ele = document.getElementById(id);
    if (ele) {
        console.log(ele);
        ele.style.display = "none";
    }
}
