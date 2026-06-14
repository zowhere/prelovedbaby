/**
 * Product detail page – image gallery and related products carousel.
 * Used on product-detail.php and product-detail-grid.php.
 *
 * Sample JavaScript for ITECA3 deliverable:
 * lets buyers switch between product photos using thumbnail clicks (Swiper).
 */

if (document.querySelector('.product-images-swiper-thumbnail')) {
  // Thumbnail strip – clicking a thumb updates the main product image.
  var productThumbsSwiper = new Swiper('.product-images-swiper-thumbnail', {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });

  new Swiper('.product-images-swiper', {
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: productThumbsSwiper,
    },
  });
}

if (document.querySelector('.recommended-products-slider')) {
  // Related listings carousel below the product details.
  new Swiper('.recommended-products-slider', {
    slidesPerView: 2,
    spaceBetween: 16,
    loop: true,
    navigation: {
      nextEl: '.recommended-products-slider-icon-left',
      prevEl: '.recommended-products-slider-icon-right',
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
    },
  });
}
