$(function () {
    $.get('http://localhost/demomvc/home/xhrGetListings', function (o) {
        console.log(o);
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<div>' + o[i].username + '<a class="del" rel="' + o[i].id + '" href="#">X</a></div>');
        }

        $('.del').live('click', function () {
            delItem = $(this);
            var id = $(this).attr('rel');

            $.post('http://localhost/demomvc/home/xhrDeleteListing', {'id': id}, function (o) {
                delItem.parent().remove();
            }, 'json');

            return false;
        });

    }, 'json');


    $('#randomInsert').submit(function () {
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function (o) {
            $('#listInserts').append('<div>' + o.text + '<a class="del" rel="' + o.id + '" href="#">X</a></div>');
        }, 'json');


        return false;
    });

});