
(function ($) {

    let slidePView = 5
    if ($(window).width() < 482) {
        slidePView = 3
    }

    let contentContainer = $('div.content');
    let contentWidth = contentContainer.width();
    contentContainer.find('table').each(function () {
        if ($(this).width() > contentWidth) {
            $(this).width(contentWidth);
            $(this).css({"display":"block", "overflow":"scroll"});
        }
    })

})(jQuery);



