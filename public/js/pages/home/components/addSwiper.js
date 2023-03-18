import Swiper from '/js/vendor/swiper/swiper-bundle.esm.browser.min.js';

const swiper = new Swiper('.section-gallery__swiper', {
    direction: 'horizontal',
    loop: true,
    pagination: {
        el: '.section-gallery__swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.section-gallery__swiper-button-next',
        prevEl: '.section-gallery__swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.section-gallery__swiper-scrollbar',
    },
});

function titleHandler(slide) {
    document.querySelector('.section-gallery__subtitle').textContent = slide.title;
}

swiper.on('realIndexChange', function (event) {
    const slide = document.querySelector(`[data-swiper-slide-index="${event.realIndex}"]`);
    document.querySelector('.section-gallery__subtitle').textContent = slide.title;
});

