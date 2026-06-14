
if (document.querySelector('.main-slider')) {
  new Swiper('.main-slider', {
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.main-slider-icon-right',
      prevEl: '.main-slider-icon-left',
    },
  });
}

if (document.querySelector('.categories-slider')) {
  new Swiper('.categories-slider', {
    slidesPerView: 2,
    spaceBetween: 16,
    loop: true,
    navigation: {
      nextEl: '.categories-slider-icon-right',
      prevEl: '.categories-slider-icon-left',
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
    },
  });
}

if (document.querySelector('.editors-picks-slider')) {
  new Swiper('.editors-picks-slider', {
    slidesPerView: 2.2,
    spaceBetween: 16,
    loop: false,
    navigation: {
      nextEl: '.editors-picks-icon-right',
      prevEl: '.editors-picks-icon-left',
    },
    breakpoints: {
      640: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
      1200: {
        slidesPerView: 6,
        spaceBetween: 24,
      },
    },
  });
}

if (document.querySelector('.dealsSwiper')) {
  new Swiper('.dealsSwiper', {
    loop: true,
    navigation: {
      nextEl: '.deal-slide-icon-left',
      prevEl: '.deal-slide-icon-right',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
}

if (document.querySelector('.Instagram-Swiper')) {
  new Swiper('.Instagram-Swiper', {
    slidesPerView: 2,
    spaceBetween: 16,
    loop: true,
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
    },
  });
}
