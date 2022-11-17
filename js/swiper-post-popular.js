var swiper_popular = new Swiper(".swiper-posts-popular", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".posts-popular-pagination",
    },
});

(function ($) {

})(jQuery);



