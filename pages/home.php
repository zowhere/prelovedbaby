<?php
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
require_once APP_ROOT . '/lib/categories.php';
$homeCategories = array_values(array_filter(
    loadNavCategories(),
    static function ($category) {
        return getCategoryImagePath($category['slug']) !== null;
    }
));
?>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PreLoved Baby</title>
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />

    
    
    <link
      rel="stylesheet"
      href="<?= htmlspecialchars($siteBase) ?>plugins/swiper/css/swiper-bundle.min.css"
    />

    
    <link href="<?= htmlspecialchars($siteBase) ?>css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>css/bootstrap-icons.min.css" />
    
    <link href="<?= htmlspecialchars($siteBase) ?>css/sass/style.css" rel="stylesheet" />
    <?php include APP_ROOT . '/views/analytics-head.php'; ?>
  </head>

  <body>
    
    <?php include APP_ROOT . '/views/header.php'; ?>

  <?php include APP_ROOT . '/views/navbar.php'; ?>


    <section class="main-slider-wrapper">
      <div class="swiper main-slider position-relative">
        <div class="swiper-wrapper">
          <div class="swiper-slide position-relative">
            <div
              class="slider-content position-absolute top-50 start-0 end-0 translate-middle-y"
            >
              <div class="container py-4 px-3">
                <p class="sub-title mb-lg-3">Preloved gear from real parents</p>
                <h2 class="large-title">
                  PreLoved Baby <br />
                  Essentials
                </h2>
                <div class="slide-btn mt-lg-5">
                  <a
                    href="<?= htmlspecialchars($siteBase) ?>pages/shop.php"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>
            <img
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/slider/slide-1.png"
              class="img-fluid rounded-0"
              alt="Preloved Baby Essentials"
            />
          </div>

          <div class="swiper-slide position-relative">
            <div
              class="slider-content position-absolute top-50 start-0 end-0 translate-middle-y"
            >
              <div class="container py-4 px-3">
                <p class="sub-title mb-lg-3">
                  Prams, pumps and cots at better prices
                </p>

                <h2 class="large-title">
                  Prams, Cots & <br />
                  Nursery Essentials
                </h2>

                <div class="slide-btn mt-lg-5">
                  <a
                    href="<?= htmlspecialchars($siteBase) ?>pages/shop.php"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/slider/slide-2.png"
              class="img-fluid rounded-0"
              alt="Baby Nursery Essentials"
            />
          </div>

          
          <div class="swiper-slide position-relative">
            <div
              class="slider-content position-absolute top-50 start-0 end-0 translate-middle-y"
            >
              <div class="container py-4 px-3">
                <p class="sub-title mb-lg-3">
                  Gear from parents near you
                </p>

                <h2 class="large-title">
                  Buy & Sell <br />
                  Baby Gear
                </h2>

                <div class="slide-btn mt-lg-5">
                  <a
                    href="<?= htmlspecialchars($siteBase) ?>pages/shop.php"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/slider/slide-3.png"
              class="img-fluid rounded-0"
              alt="Buy and Sell Baby Products"
            />
          </div>

          
          <div class="swiper-slide position-relative">
            <div
              class="slider-content position-absolute top-50 start-0 end-0 translate-middle-y"
            >
              <div class="container py-4 px-3">
                <p class="sub-title mb-lg-3">
                  Good gear, less waste
                </p>

                <h2 class="large-title">
                  Safe, Affordable <br />
                  Preloved Gear
                </h2>

                <div class="slide-btn mt-lg-5">
                  <a
                    href="<?= htmlspecialchars($siteBase) ?>pages/shop.php"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/slider/slide-4.png"
              class="img-fluid rounded-0"
              alt="Affordable Baby Essentials"
            />
          </div>

          
          <div class="swiper-slide position-relative">
            <div
              class="slider-content position-absolute top-50 start-0 end-0 translate-middle-y"
            >
              <div class="container py-4 px-3">
                <p class="sub-title mb-lg-3">
                  Everything your little one needs, gently preloved
                </p>

                <h2 class="large-title">
                  Prams, Cots &amp; <br />
                  Nursery Essentials
                </h2>

                <div class="slide-btn mt-lg-5">
                  <a
                    href="<?= htmlspecialchars($siteBase) ?>pages/shop.php"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/slider/slide-5.png"
              class="img-fluid rounded-0"
              alt="Nursery and Baby Gear"
            />
          </div>
        </div>

        
        <div
          class="swiper-nav d-flex align-items-center justify-content-between gap-3 position-absolute end-0 start-0 mx-3 d-none d-lg-flex"
        >
          <div class="slide-icon main-slider-icon-left">
            <i class="bi bi-arrow-left"></i>
          </div>

          <div class="slide-icon main-slider-icon-right">
            <i class="bi bi-arrow-right"></i>
          </div>
        </div>
      </div>
    </section>
    

    
    <main class="main-content">
      
      <section class="categories-slider-wrapper py-5">
        <div class="container position-relative px-3">
          <div class="d-flex align-items-center justify-content-between mb-5">
            <h2 class="section-title">Essential Baby Gear</h2>
            <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="btn btn-outline-dark px-4"
              >Browse Categories</a
            >
          </div>
          <div class="categories-catalog">
            <div class="swiper categories-slider">
              <div class="swiper-wrapper">
                <?php foreach ($homeCategories as $category) :
                    $imagePath = getCategoryImagePath($category['slug']);
                    if ($imagePath === null) {
                        continue;
                    }
                    $listingLabel = (int) $category['listing_count'] === 1
                        ? '1 Listing'
                        : (int) $category['listing_count'] . ' Listings';
                ?>
                <div class="swiper-slide">
                  <a href="<?= categoryShopUrl($category['slug'], $siteBase) ?>">
                    <div class="d-flex flex-column align-items-center gap-3">
                      <img
                        src="<?= htmlspecialchars($siteBase) ?><?= htmlspecialchars($imagePath) ?>"
                        class="cat-img rounded-circle"
                        alt="<?= htmlspecialchars($category['name']) ?>"
                        loading="lazy"
                        decoding="async"
                      />
                      <div class="text-center">
                        <h3 class="cat-title mb-0"><?= htmlspecialchars($category['name']) ?></h3>
                        <p class="mb-0 cat-number"><?= htmlspecialchars($listingLabel) ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div
            class="category-swiper-nav d-flex align-items-center justify-content-center justify-content-lg-between gap-3 end-0 start-0 translate-middle-y"
          >
            <div class="slide-icon categories-slider-icon-left">
              <i class="bi bi-arrow-left"></i>
            </div>
            <div class="slide-icon categories-slider-icon-right">
              <i class="bi bi-arrow-right"></i>
            </div>
          </div>
        </div>
      </section>
      

      
      <section class="special-offer featured-listings-compact py-4">
        <div class="container px-3">
          <div class="d-flex align-items-center justify-content-center mb-3">
            <h2 class="section-title">Featured Listings</h2>
          </div>
          <div class="row row-cols-2 row-cols-lg-4 g-3">
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php?id=bugaboo-fox" class="text-decoration-none text-body">
                  <div class="featured-img-wrap featured-img-wrap--compact featured-img-wrap--stroller">
                    <img
                      src="<?= htmlspecialchars($siteBase) ?>images/gallery/deals/featured-bugaboo-stroller.jpg"
                      class="featured-img"
                      alt="Bugaboo stroller"
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 12,500</p>
                  </a>
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php?id=bugaboo-fox" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none text-body">
                  <div class="featured-img-wrap featured-img-wrap--compact featured-img-wrap--stroller">
                    <img
                      src="<?= htmlspecialchars($siteBase) ?>images/gallery/deals/featured-nuna-stroller.jpg"
                      class="featured-img"
                      alt="Nuna Mixx stroller"
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 8,900</p>
                  </a>
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none text-body">
                  <div class="featured-img-wrap featured-img-wrap--compact featured-img-wrap--product">
                    <img
                      src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/bassinet.png"
                      class="featured-img"
                      alt="Smart bassinet"
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 18,500</p>
                  </a>
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php?id=car-seat" class="text-decoration-none text-body">
                  <div class="featured-img-wrap featured-img-wrap--compact featured-img-wrap--product">
                    <img
                      src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/car-seat.jpg"
                      class="featured-img"
                      alt="Car seat"
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 3,500</p>
                  </a>
                  <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php?id=car-seat" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      

      
      <section class="special-offer py-5">
        <div class="container px-3">
          <div class="d-flex align-items-center justify-content-center mb-4">
            <h2 class="section-title">Shop By Brands</h2>
          </div>
          <div class="text-center">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-4">
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/pampers.svg" class="img-fluid brand-logo-img" alt="Pampers" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/chelino-baby.png" class="img-fluid brand-logo-img" alt="Chelino Baby" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/medela.svg" class="img-fluid brand-logo-img" alt="Medela" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/chicco.svg" class="img-fluid brand-logo-img" alt="Chicco" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/nuna.svg" class="img-fluid brand-logo-img" alt="Nuna" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/bugaboo.svg" class="img-fluid brand-logo-img" alt="Bugaboo" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/snoo.png" class="img-fluid brand-logo-img" alt="SNOO" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/huggies.svg" class="img-fluid brand-logo-img" alt="Huggies" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/tommee-tippee.svg" class="img-fluid brand-logo-img" alt="Tommee Tippee" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/brands/johnsons-baby.svg" class="img-fluid brand-logo-img" alt="Johnson's Baby" />
                  </div>
                </a>
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
                src="<?= htmlspecialchars($siteBase) ?>images/gallery/payment/stripe.png"
                class="img-fluid"
                width="40"
                alt="Stripe"
            /></a>
          </div>
        </div>
        
      </div>
    </footer>
    

    
    <a href="javaScript:;" class="back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>
    

    
  <?php include APP_ROOT . '/views/cart-offcanvas.php'; ?>
  

    
    <div
      class="modal fade"
      id="QuickViewModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered"
      >
        <div class="modal-content rounded-3">
          <div class="modal-header px-4">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Product Details
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body p-4">
            <div class="row g-4">
              <div class="col-12 col-xl-6">
                <div class="product-images-grid">
                  <div class="product-zoom-images">
                    <div class="row row-cols-2 g-4">
                      <div class="col">
                        <div>
                          <img
                            src="<?= htmlspecialchars($siteBase) ?>images/gallery/product-images/01.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <img
                            src="<?= htmlspecialchars($siteBase) ?>images/gallery/product-images/02.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <img
                            src="<?= htmlspecialchars($siteBase) ?>images/gallery/product-images/03.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <img
                            src="<?= htmlspecialchars($siteBase) ?>images/gallery/product-images/04.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="product-details">
                  <p class="mb-1">Chicco &middot; Like New</p>
                  <h2 class="mb-0">Compact Baby Pram</h2>
                  <?php $qv = $products['chicco-pram']; ?>
                  <div class="d-flex align-items-center gap-2 my-3">
                    <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-inline-flex align-items-center gap-2 text-decoration-none">
                      <img src="<?= htmlspecialchars($siteBase . $qv['seller_avatar']) ?>" class="seller-avatar" alt="<?= htmlspecialchars($qv['seller']) ?>" width="36" height="36" loading="lazy">
                      <span>
                        <span class="d-block font-14 fw-semibold text-body"><?= htmlspecialchars($qv['seller']) ?></span>
                        <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> <?= number_format($qv['seller_rating'], 1) ?> · <?= (int) $qv['seller_reviews'] ?> reviews</span>
                      </span>
                    </a>
                  </div>
                  <div class="product-price d-flex align-items-center gap-2">
                    <span class="fs-3 fw-semibold">R 4,500</span>
                    <span class="badge badge-pill bg-light text-dark border rounded-5">Preloved</span>
                  </div>
                  <p class="product-short-desc mt-3 mb-0"><?= htmlspecialchars($products['chicco-pram']['short_desc']) ?></p>

                  <div class="product-size mt-4">
                    <p class="mb-2">Condition</p>
                    <div class="product-size-list d-flex align-items-center gap-3 flex-wrap">
                      <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="qv-options-condition" id="qv-condition-like-new" checked>
                        <label class="btn btn-outline-dark btn-product-size" for="qv-condition-like-new">Like New</label>
                      </div>
                      <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="qv-options-condition" id="qv-condition-good">
                        <label class="btn btn-outline-dark btn-product-size" for="qv-condition-good">Good</label>
                      </div>
                      <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="qv-options-condition" id="qv-condition-fair">
                        <label class="btn btn-outline-dark btn-product-size" for="qv-condition-fair">Fair</label>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <p class="mb-2">Availability</p>
                    <p class="mb-0 font-14 text-body-secondary"><span class="fw-semibold">1 item</span>, only one available</p>
                  </div>

                  <div
                    class="product-cart-buttons d-grid d-md-flex align-items-center gap-3 mt-4"
                  >
                    <button
                      type="button"
                      class="btn btn-dark border border-2 rounded-5 border-dark py-2 px-5 d-flex align-items-center justify-content-center gap-2 w-100"
                    >
                      <i class="bi bi-cart-plus"></i>View Listing
                    </button>
</div>

                  <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center gap-2 font-14">
                      <i class="bi bi-truck"></i>
                      <span
                        ><span class="fw-semibold">Courier delivery:</span>
                        <?= $courierPartners ?> nationwide. Collection arranged with the seller.</span
                      >
                    </p>
                    <p class="mb-2 d-flex align-items-center gap-2 font-14">
                      <i class="bi bi-alarm"></i
                      ><span
                        ><span class="fw-semibold">Estimated Delivery:</span>
                        <?= $courierPartnersShort ?>, 2-5 business days nationwide</span
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    

    
  <?php include APP_ROOT . '/views/search-modal.php'; ?>
  

    
    <script src="<?= htmlspecialchars($siteBase) ?>js/jquery.min.js"></script>
    <script src="<?= htmlspecialchars($siteBase) ?>js/bootstrap.bundle.min.js"></script>
    
    <script src="plugins/swiper/js/swiper-bundle.min.js"></script>
    <script src="<?= htmlspecialchars($siteBase) ?>js/search-slider.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/search-modal.js"></script>
    
    <script src="<?= htmlspecialchars($siteBase) ?>js/index.js"></script>
    <script src="<?= htmlspecialchars($siteBase) ?>js/main.js"></script>
  </body>
</html>
