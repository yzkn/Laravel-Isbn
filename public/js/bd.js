$(function () {
    $('#callOpenbdApi').click(function (e) {
        const isbn = $('#summary__isbn').val();
        const url = '/books/bd/' + isbn;

        $.getJSON(url, function (data) {
            if (data[0] == null) {
                $('#myModal').modal(options);
            } else {
                if (data[0].summary.cover == '') {
                    $('#summary__cover').html('<img src="" />');
                } else {
                    $('#summary__cover').html('<img src="' + data[0].summary.cover + '" style="border:solid 1px #000000" />');
                }
                $('#summary__title').val(data[0].summary.title);
                $('#summary__publisher').val(data[0].summary.publisher);
                $('#summary__author').val(data[0].summary.author);
                $('#summary__pubdate').val(data[0].summary.pubdate);
                if (data[0].summary.series == '' || data[0].summary.volume == '') {
                    var title = data[0].summary.title;

                    var pat1 = /\s*?[\[(<{＜≪《「『【〔［｛〈（〝“‘]*?[#＃♯第]*?([0-9]+?)[巻]*?[\])>}＞≫》」』】〕］｝〉）〟”’]*?\s*?/;
                    var titlearr = title.split(pat1);
                    var lastpart = title.slice(titlearr.length - 1, titlearr.length).join('');
                    var series = (title + '###').replace((lastpart + '###'), '');

                    var pat2 = /\s*?[\[(<{＜≪《「『【〔［｛〈（〝“‘#＃♯第巻\])>}＞≫》」』】〕］｝〉）〟”’]*?/g;
                    var volume = (title.replace(series, '')).replace(pat2, '');

                    $('#summary__series').val(series);
                    $('#summary__volume').val(volume);
                } else {
                    $('#summary__series').val(data[0].summary.series);
                    $('#summary__volume').val(data[0].summary.volume);
                }
                $('#summary__cover').val(data[0].summary.cover);
            }
        });
    });
});
