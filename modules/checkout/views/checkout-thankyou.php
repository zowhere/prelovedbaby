<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreLoved Baby</title>
  
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

<link rel="stylesheet" href="plugins/swiper/css/swiper-bundle.min.css">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-icons.min.css">
  
  <link href="css/sass/style.css" rel="stylesheet">
  
</head>

<body>

  
  <?php include APP_ROOT . '/views/top-header.php'; ?>

  <?php include APP_ROOT . '/views/site-navbar.php'; ?>

  

  
  <main class="main-content">

    
    <section class="section-breadcrumb bg-img-page-header d-flex align-items-center justify-content-center">
      <div class="container px-3 d-flex flex-column align-items-center justify-content-center">
        <h2>Thank You</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Thank You</li>
          </ol>
        </nav>
      </div>
    </section>
    
    
    <section class="py-5 thank-you-section">
      <div class="container px-3">
          <div class="thank-you-content">
            <div class="text-center">
                 <div class="fs-1 mb-3">
                  <i class="bi bi-check-circle-fill text-success"></i>
                 </div>
                 <p class="mb-2">Order id #AB58647</p>
                 <h5 class="mb-0 fw-semibold">Thank you for your order!</h5>
                 <div class="mt-4">
                   <a href="index.php" class="btn btn-dark py-2 px-4 rounded-3">Continue Shopping</a>
                 </div>
            </div>
          </div>
      </div>
    </section>

        
        <section class="py-5">
          <div class="container px-3">
            <div class="d-flex align-items-center justify-content-between mb-5">
              <h2 class="section-title">You may also like</h2>
              <div class="recommended-products-swiper-nav d-flex align-items-center gap-3">
                <div class="slide-icon recommended-products-slider-icon-left"><i class="bi bi-arrow-left"></i></div>
                <div class="slide-icon recommended-products-slider-icon-right"><i class="bi bi-arrow-right"></i></div>
              </div>
            </div>
            <div class="recommended-products">
              <div class="swiper recommended-products-slider">
                <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail-grid.php">
                        <img src="images/gallery/products/recommended/chicco-pram.png" class="product-img img-fluid rounded-3" alt="Compact Baby Pram">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Compact Baby Pram</h3>
                        <p class="mb-1 product-price">R 4,500</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/sarah-m.jpg" class="seller-avatar" alt="Sarah M." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Sarah M.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.9 · 4 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Sandton, Johannesburg</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/breast-pump.png" class="product-img img-fluid rounded-3" alt="Electric Breast Pump">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Medela</p>
                        <h3 class="product-name mb-1">Electric Breast Pump</h3>
                        <p class="mb-1 product-price">R 2,800</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/lerato-n.jpg" class="seller-avatar" alt="Lerato N." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Lerato N.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.8 · 8 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Sea Point, Cape Town</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/baby-cot.png" class="product-img img-fluid rounded-3" alt="Wooden Baby Cot">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Stokke</p>
                        <h3 class="product-name mb-1">Wooden Baby Cot</h3>
                        <p class="mb-1 product-price">R 3,200</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/priya-s.jpg" class="seller-avatar" alt="Priya K." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Priya K.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 5.0 · 6 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Umhlanga, Durban</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/car-seat.jpg" class="product-img img-fluid rounded-3" alt="Group 0+ Car Seat">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Nuna</p>
                        <h3 class="product-name mb-1">Group 0+ Car Seat</h3>
                        <p class="mb-1 product-price">R 3,500</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/thabo-m.jpg" class="seller-avatar" alt="Thabo M." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Thabo M.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.7 · 9 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Centurion, Pretoria</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/high-chair.png" class="product-img img-fluid rounded-3" alt="Convertible High Chair">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Convertible High Chair</h3>
                        <p class="mb-1 product-price">R 1,800</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/chris-w.jpg" class="seller-avatar" alt="Chris W." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Chris W.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.9 · 5 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Rosebank, Johannesburg</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/bassinet.png" class="product-img img-fluid rounded-3" alt="Co-Sleeper Bassinet">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Bugaboo</p>
                        <h3 class="product-name mb-1">Co-Sleeper Bassinet</h3>
                        <p class="mb-1 product-price">R 2,400</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/nadia-p.jpg" class="seller-avatar" alt="Nadia P." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Nadia P.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.8 · 7 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Ballito, Durban</p>
                      </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        

  </main>
  

  
  <footer class="footer-strip py-4 border-top">
    <div class="container px-3">
      <div class="row g-4 align-items-center">
        <div class="col-12 col-lg-auto">
          <p class="mb-0 font-12">@All rights reserved. PreLoved Baby</p>
        </div>
        <div class="col-12 col-lg-auto ms-lg-auto">
          <a href="javascript:;"
            ><img
              src="images/gallery/payment/stripe.png"
              class="img-fluid"
              width="40"
              alt="Stripe"
          /></a>
        </div>
      </div>
      
    </div>
  </footer>
  

  
  <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
  

  
  <?php include APP_ROOT . '/views/cart-offcanvas.php'; ?>
  

  
  <?php include APP_ROOT . '/views/search-modal.php'; ?>
  

  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  
  <script src="plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="js/search-slider.js"></script>
  <script src="js/search-modal.js"></script>

  <script src="js/main.js"></script>
</body>

</html>