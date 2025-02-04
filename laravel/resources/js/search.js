$(document).ready(function () {

    $(document).on("keyup", "#search", function () {
        var text = $(this).val();
        var url = $(this).attr("href");
        getText(text, url);
    });
});

function getText(text, url) {
    $.ajax({
        type: "GET",
        url: url,
        data: {query:text},
        success: function (response) {
            $("#motorcycles_data").html(response);
        }
    })
}
