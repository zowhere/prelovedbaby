<?php
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sarah M. · Seller Profile · PreLoved Baby</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>plugins/swiper/css/swiper-bundle.min.css">
  <link href="<?= htmlspecialchars($siteBase) ?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>css/bootstrap-icons.min.css">
  <link href="<?= htmlspecialchars($siteBase) ?>css/sass/style.css" rel="stylesheet">
  <?php include APP_ROOT . '/views/analytics-head.php'; ?>
</head>

<body>

    
  <?php include APP_ROOT . '/views/header.php'; ?>

  <?php include APP_ROOT . '/views/navbar.php'; ?>


  <main class="main-content">
    <section class="section-breadcrumb bg-img-page-header d-flex align-items-center justify-content-center">
      <div class="container px-3 d-flex flex-column align-items-center justify-content-center">
        <h2>Seller Profile</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Sarah M.</li>
          </ol>
        </nav>
      </div>
    </section>

    <section class="py-5">
      <div class="container px-3">
        <div class="row g-4 g-lg-5">
          <div class="col-12 col-lg-4">
            <div class="seller-profile-card">
              <div class="text-center">
                <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/sellers/sarah-m.jpg" class="seller-avatar seller-avatar-xl mx-auto mb-3" alt="Sarah M." width="120" height="120" loading="lazy">
                <h4 class="mb-1">Sarah M.</h4>
                <p class="seller-meta mb-3"><i class="bi bi-geo-alt"></i> Sandton, Johannesburg</p>
                <div class="rating-star mb-1">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-half text-warning"></i>
                </div>
                <p class="mb-3">4.9 overall · 4 reviews</p>
                <p class="seller-listings-count mb-4">Member since March 2023 · Usually responds within 2 hours</p>
                <a href="<?= htmlspecialchars($siteBase) ?>pages/contact.php" class="btn btn-dark w-100 rounded-5 mb-2"><i class="bi bi-chat-dots me-2"></i>Message Sarah</a>
              </div>
              <hr>
              <div class="seller-rating-breakdown">
                <h6 class="mb-3">Seller ratings</h6>
                <div class="rating-row">
                  <span class="rating-label">Communication</span>
                  <div class="progress"><div class="progress-bar bg-dark" style="width: 98%;"></div></div>
                  <span class="rating-score">4.9</span>
                </div>
                <div class="rating-row">
                  <span class="rating-label">Item as described</span>
                  <div class="progress"><div class="progress-bar bg-dark" style="width: 96%;"></div></div>
                  <span class="rating-score">4.8</span>
                </div>
                <div class="rating-row">
                  <span class="rating-label">Dispatch speed</span>
                  <div class="progress"><div class="progress-bar bg-dark" style="width: 94%;"></div></div>
                  <span class="rating-score">4.7</span>
                </div>
                <div class="rating-row">
                  <span class="rating-label">Overall experience</span>
                  <div class="progress"><div class="progress-bar bg-dark" style="width: 97%;"></div></div>
                  <span class="rating-score">4.9</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-8">
            <div class="mb-5">
              <h5 class="mb-3">About this seller</h5>
              <p class="text-para mb-0">Mom of two, selling gear our kids have outgrown. I post honest photos and answer messages quickly. Collection in Sandton, or courier via <?= $courierPartners ?>.</p>
            </div>

            <div class="mb-5">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0">Active listings <span class="seller-listings-count">(2)</span></h5>
              </div>
              <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3 h-100">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Like New</span>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/chicco-pram.png" class="product-img img-fluid rounded-3" alt="Compact Baby Pram" loading="lazy" decoding="async">
                        </a>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Compact Baby Pram</h3>
                        <p class="mb-1 product-price">R 4,500</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3 h-100">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Good</span>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/breast-pump.png" class="product-img img-fluid rounded-3" alt="Medela Swing Breast Pump" loading="lazy" decoding="async">
                        </a>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Medela</p>
                        <h3 class="product-name mb-1">Swing Breast Pump</h3>
                        <p class="mb-1 product-price">R 2,100</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <h5 class="mb-4">Reviews</h5>
              <div class="customer-reviews-list">
                <div class="customer-reviews-list-item border-top py-4">
                  <div class="d-flex align-items-start gap-3">
                    <div class="customer-pic"><span>N</span></div>
                    <div class="flex-grow-1">
                      <div class="rating-star font-14 mb-1">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <h6 class="mb-0 customer-name">Nomsa K.</h6>
                    </div>
                    <div class="review-date"><span>3 february 2025</span></div>
                  </div>
                  <div class="review-description mt-2">
                    <div class="seller-review-tags mb-2">
                      <span class="seller-review-tag">Communication 5/5</span>
                      <span class="seller-review-tag">Item 4/5</span>
                      <span class="seller-review-tag">Dispatch 5/5</span>
                    </div>
                    <p class="mb-0">Got the Chicco pram last week. Basket has a few scuffs like she showed in the photos, totally fine. Replied on WhatsApp same afternoon when I asked about collection.</p>
                  </div>
                </div>
                <div class="customer-reviews-list-item border-top py-4">
                  <div class="d-flex align-items-start gap-3">
                    <div class="customer-pic"><span>J</span></div>
                    <div class="flex-grow-1">
                      <div class="rating-star font-14 mb-1">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                      </div>
                      <h6 class="mb-0 customer-name">James P.</h6>
                    </div>
                    <div class="review-date"><span>22 january 2025</span></div>
                  </div>
                  <div class="review-description mt-2">
                    <div class="seller-review-tags mb-2">
                      <span class="seller-review-tag">Communication 5/5</span>
                      <span class="seller-review-tag">Item 5/5</span>
                      <span class="seller-review-tag">Dispatch 4/5</span>
                    </div>
                    <p class="mb-0">Collected the pump on a Saturday morning. Works great, no issues. She waited while we tested it.</p>
                  </div>
                </div>
                <div class="customer-reviews-list-item border-top py-4">
                  <div class="d-flex align-items-start gap-3">
                    <div class="customer-pic"><span>T</span></div>
                    <div class="flex-grow-1">
                      <div class="rating-star font-14 mb-1">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                      </div>
                      <h6 class="mb-0 customer-name">Thandi M.</h6>
                    </div>
                    <div class="review-date"><span>8 january 2025</span></div>
                  </div>
                  <div class="review-description mt-2">
                    <div class="seller-review-tags mb-2">
                      <span class="seller-review-tag">Communication 5/5</span>
                      <span class="seller-review-tag">Item 5/5</span>
                      <span class="seller-review-tag">Dispatch 5/5</span>
                    </div>
                    <p class="mb-0">Bought a cot from her before this. Both times the listing matched what arrived. Courier booked the day I paid, tracking sent straight away.</p>
                  </div>
                </div>
                <div class="customer-reviews-list-item border-top py-4 border-bottom">
                  <div class="d-flex align-items-start gap-3">
                    <div class="customer-pic"><span>L</span></div>
                    <div class="flex-grow-1">
                      <div class="rating-star font-14 mb-1">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                      </div>
                      <h6 class="mb-0 customer-name">Lerato N.</h6>
                    </div>
                    <div class="review-date"><span>2 january 2025</span></div>
                  </div>
                  <div class="review-description mt-2">
                    <div class="seller-review-tags mb-2">
                      <span class="seller-review-tag">Communication 4/5</span>
                      <span class="seller-review-tag">Item 5/5</span>
                      <span class="seller-review-tag">Dispatch 5/5</span>
                    </div>
                    <p class="mb-0">Quick handover at a petrol station on William Nicol. Pump was clean and had all the parts in the box.</p>
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
        <div class="col-12 col-lg-auto"><p class="mb-0 font-12">@All rights reserved. PreLoved Baby</p></div>
      </div>
    </div>
  </footer>

  <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>

  <?php include APP_ROOT . '/views/search-modal.php'; ?>
  <?php include APP_ROOT . '/views/cart-offcanvas.php'; ?>

  <script src="<?= htmlspecialchars($siteBase) ?>js/jquery.min.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/bootstrap.bundle.min.js"></script>
  <script src="plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/search-modal.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/main.js"></script>
</body>

</html>
