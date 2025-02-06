$(document).ready(function (){
   $(document).on("click", ".pagination a", function (event) {
      event.preventDefault();
       var url = $(this).attr("href");
       getData(url);
   });
});

function getData(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "html",
        success: function(response) {
            $("#data").html(response);
        }
    });
}
