
var swiper = new Swiper(".homeblogSwiper", {
    spaceBetween: 20,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        "@1.00": {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        "@1.50": {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        "@1.75": {
            slidesPerView: 4,
            spaceBetween: 10,
        },
    },
});