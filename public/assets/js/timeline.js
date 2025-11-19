var swiper = new Swiper(".timelineSwiper", {
    spaceBetween: 30,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
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
            slidesPerView: 4,
            spaceBetween: 20,
        },
        "@1.75": {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
});

// industries