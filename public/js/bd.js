$(function () {

    $('#summary__isbn').bind("keydown", function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#callOpenbdApi').blur();
            $('#callOpenbdApi').click();
        }
    });

    $('form').bind("keydown", function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#callOpenbdApi').blur();
            $('#callOpenbdApi').click();
        }
    });

    $('#callOpenbdApi').click(function (e) {
        const isbn = $('#summary__isbn').val().replace(/-/g, '').replace('/ /g', '');
        $('#summary__isbn').val(isbn);
        if ((!isNaN(isbn)) && ((isbn.toString()).length == 13)) {
            // getJSON処理を同期通信に変更
            $.ajaxSetup({
                async: false
            });

            getBdJson(isbn);

            // getJSON処理を非同期通信に戻す
            $.ajaxSetup({
                async: true
            });
        }
    });
});

function getBdJson(isbn) {
    const url = '/books/bd/' + isbn;
    console.log('[bd] url: ' + url);

    $.getJSON(url, function (data) {
        console.log('[bd] url: ' + url + ' , data: ' + data.length);
        console.log('[bd] url: ' + url + ' , data: ' + data);
        if (data.length > 0) {
            if (data[0].summary.cover != '') {
                $('#summary__cover').val(data[0].summary.cover);
            }
            $('#summary__title').val(data[0].summary.title);
            $('#summary__publisher').val(data[0].summary.publisher);
            $('#summary__author').val(data[0].summary.author);
            $('#summary__pubdate').val(data[0].summary.pubdate);
            if (data[0].summary.series == '' || data[0].summary.volume == '') {
                var title = data[0].summary.title;

                var pat1 = /(\s*[\[(<{＜≪《「『【〔［｛〈（〝“‘]*?[#＃♯第]*[0-9０-９]+[巻]*[\])>}＞≫》」』】〕］｝〉）〟”’]*\s*)/;
                var titlearr = title.split(pat1);
                var series = title;
                if (titlearr.length > 1) {
                    var lastpart;
                    if (titlearr[titlearr.length - 1] == '') {
                        lastpart = titlearr.slice(titlearr.length - 2, titlearr.length);
                    } else {
                        lastpart = titlearr.slice(titlearr.length - 1, titlearr.length);
                    }
                    series = (title + '###').replace((lastpart.join('') + '###'), '');
                }

                var pat2 = /\s*[\[(<{＜≪《「『【〔［｛〈（〝“‘#＃♯第巻\])>}＞≫》」』】〕］｝〉）〟”’]+\s*/g;
                var volume = (title.replace(series, '')).replace(pat2, '');

                $('#summary__series').val(series);
                $('#summary__volume').val(volume);
            } else {
                $('#summary__series').val(data[0].summary.series);
                $('#summary__volume').val(data[0].summary.volume);
            }
        } else {
            console.log('[bd] url: ' + url + ' data.loegth == 0');
            getNdlJson(isbn);
        }
    }).fail(function () {
        console.log('[bd] url: ' + url + ' error');
        getNdlJson(isbn);
    });
}

function getNdlJson(isbn) {
    const url = '/books/ndl/' + isbn;
    console.log('[ndl] url: ' + url);
    $.getJSON(url, function (data) {
        console.log('[ndl] url: ' + url + ' , data: ' + data);
        if (data['records']['record'] == null) {
            $('.modal').show();
        } else {
            // if (data[0].summary.cover != '') {
            //     $('#summary__cover').val(data[0].summary.cover);
            // }
            $('#summary__title').val(data['records']['record']['recordData']['srw_dc_dc']['dc_title']);
            $('#summary__publisher').val(data['records']['record']['recordData']['srw_dc_dc']['dc_publisher']);
            $('#summary__author').val(data['records']['record']['recordData']['srw_dc_dc']['dc_creator']);
            if (true) {
                var title = data['records']['record']['recordData']['srw_dc_dc']['dc_title'];

                var pat1 = /(\s*[\[(<{＜≪《「『【〔［｛〈（〝“‘]*?[#＃♯第]*[0-9０-９]+[巻]*[\])>}＞≫》」』】〕］｝〉）〟”’]*\s*)/;
                var titlearr = title.split(pat1);
                var series = title;
                if (titlearr.length > 1) {
                    var lastpart;
                    if (titlearr[titlearr.length - 1] == '') {
                        lastpart = titlearr.slice(titlearr.length - 2, titlearr.length);
                    } else {
                        lastpart = titlearr.slice(titlearr.length - 1, titlearr.length);
                    }
                    series = (title + '###').replace((lastpart.join('') + '###'), '');
                }

                var pat2 = /\s*[\[(<{＜≪《「『【〔［｛〈（〝“‘#＃♯第巻\])>}＞≫》」』】〕］｝〉）〟”’]+\s*/g;
                var volume = (title.replace(series, '')).replace(pat2, '');

                $('#summary__series').val(series);
                $('#summary__volume').val(volume);
            }
        }

    }).fail(function () {
        console.log('[ndl] url: ' + url + ' error');
    });
}

function unescapeHTML(str) {
    var div = document.createElement("div");
    div.innerHTML = str.replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/ /g, "&nbsp;")
        .replace(/\r/g, "&#13;")
        .replace(/\n/g, "&#10;");
    return div.textContent || div.innerText;
}
