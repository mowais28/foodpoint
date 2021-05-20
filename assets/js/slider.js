var swiper = new Swiper('.swiper-container', {
    direction: 'vertical',
    slidesPerView: 1,
    spaceBetween: 5,
    mousewheel: true,
    parallax: true,
    centeredSlides: true,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    keyboard: {
        enabled: true,
      },
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    //   },
});