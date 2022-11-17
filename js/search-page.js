(function ($) {

    $('#filter-major select').change(function () {
        let searchArray = [];
        $('#filter-major select').each(function () {
            if ($(this).val() != '') {
                searchArray.push($(this).val());
            }
        })
        $('#filter-major input#input_search').val(searchArray.toString())
        if (searchArray.length > 0) {
            $('#filter-major #submit').removeAttr('disabled');
        }
        else {
            $('#filter-major #submit').attr("disabled", true);
        }

    })



})(jQuery);



