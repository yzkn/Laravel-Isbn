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
        if ((!isNaN(isbn)) && ((isbn.toString()).length == 13)) {
            const url = '/books/bd/' + isbn;
            $.getJSON(url, function (data) {
                if (data[0] == null) {
                    $('.modal').show();
                } else {
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

                    summary__cover
                }
            });
        }
    });
});
