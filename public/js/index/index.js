$(document).ready(function () {
    $(document).on('click', '.e_ajax_deleted', click_delete);
    function click_delete(e) {
        e.preventDefault();
        var html = $(this).closest('.e_ajax_deleted');
        var url = html.attr('href');
        console.log(url);
        var r = confirm("Do you want to delete?");
        if (r == true) {
            e.preventDefault();
            html.parent().parent().remove();
            $.post(url, function (o) {
            }, 'json');
        } else {
            console.log("You pressed Cancel!");
        }
    }

});
