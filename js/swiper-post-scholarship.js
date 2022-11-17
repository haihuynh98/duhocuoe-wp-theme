
(function ($) {

    if ($( window ).width() > 425) {
        var swiper_scholarship = new Swiper(".swiper-posts-scholarship", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".posts-scholarship-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".posts-scholarship-button-next",
                prevEl: ".posts-scholarship-button-prev",
            },
        });
    } else {
        var swiper_scholarship = new Swiper(".swiper-posts-scholarship", {
            slidesPerView: 1,
            spaceBetween: 30,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".posts-scholarship-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".posts-scholarship-button-next",
                prevEl: ".posts-scholarship-button-prev",
            },
        });
    }

    let maxHeight = 0;
    let postContainerScholarship = $('.post-container-scholarship');
    postContainerScholarship.each(function () {
        if ($(this).height() > maxHeight) {
            maxHeight = $(this).height();
        }
    })
    postContainerScholarship.each(function () {
        $(this).height(maxHeight);
    })
})(jQuery);



