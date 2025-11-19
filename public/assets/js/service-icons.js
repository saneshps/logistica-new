var swiper = new Swiper(".serviceiconSwiper", {
    spaceBetween: 30,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        "@0.00": {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        "@0.75": {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        "@1.00": {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        "@1.25": {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        "@1.50": {
            slidesPerView: 5,
            spaceBetween: 20,
        },
        "@1.75": {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});
