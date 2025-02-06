$(document).ready(function () {
    $('#search').on('keyup', function () {
        let text = $(this).val();
        let url = window.location.origin + "/search";
        if (text.length > 1) {
            $.ajax({
                url: url,
                type: "GET",
                data: {query: text},
                success: function (response) {
                    let suggestions = $('.suggestions');
                    suggestions.empty();
                    if (response.length > 0) {
                        response.forEach(function (data) {
                            if ('title' in data.valueOf()) {
                                suggestions.append(
                                    `<div onclick="window.location='/vehicle/${data.id}'">${data.title}</div>`
                                );
                            } else {
                                suggestions.append(
                                    `<div onclick="window.location='/spare_parts/${data.vehicle_model}'">${data.name}</div>`
                                );
                            }
                        });
                    } else {
                        suggestions.append('<div>Žiadne výsledky</div>');
                    }
                }
            });
        } else {
            $('.suggestions').empty();
        }
    });
});
