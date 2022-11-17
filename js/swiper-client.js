
(function ($) {

    let slidePView = 5
    if ($(window).width() < 482) {
        slidePView = 3
    }

    var swiper_customers = new Swiper(".swiper-customers", {
        slidesPerView: slidePView,
        spaceBetween: 30,
        freeMode: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

})(jQuery);


(function ($) {

    let slidePView = 5
    if ($(window).width() < 482) {
        slidePView = 3
    }

    var swiper_visas = new Swiper(".swiper-visas", {
        slidesPerView: slidePView,
        spaceBetween: 30,
        freeMode: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

})(jQuery);



