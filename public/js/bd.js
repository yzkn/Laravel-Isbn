$(function () {
    $('#callOpenbdApi').click(function (e) {
        const isbn = $("#summary__isbn").val();
        const url = "/books/bd/" + isbn;

        $.getJSON(url, function (data) {
            if (data[0] == null) {
                $('#myModal').modal(options);
            } else {
                if (data[0].summary.cover == "") {
                    $("#summary__cover").html('<img src=\"\" />');
                } else {
                    $("#summary__cover").html('<img src=\"' + data[0].summary.cover + '\" style=\"border:solid 1px #000000\" />');
                }
                $("#summary__title").val(data[0].summary.title);
                $("#summary__publisher").val(data[0].summary.publisher);
                $("#summary__author").val(data[0].summary.author);
                $("#summary__pubdate").val(data[0].summary.pubdate);
                $("#summary__cover").val(data[0].summary.cover);
            }
        });
    });
});
