
$(document).ready(function(){
    $('.switch-lang').on('click', function (e) {

        e.preventDefault();
        var oldUrl = URI(document.location);
        var lang = $(this).data('lang');
        var newUrl = oldUrl
            .removeSearch('lang')
            .addSearch('lang', lang);

        document.location = newUrl.toString();
    });
});
