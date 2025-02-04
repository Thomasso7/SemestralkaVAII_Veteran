$(document).ready(function (){
   $(document).on("click", ".pagination a", function (event) {
      event.preventDefault();
      var url = $(this).attr('href');
      getMotorcycles(url);
   });
});

function getMotorcycles(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "html",
        success: function(response) {
            $("#motorcycles_data").html(response);
        }
    });
}
