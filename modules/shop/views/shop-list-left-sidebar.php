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

  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" rel="stylesheet"
    media="all">

  <link rel="stylesheet" type="text/css" href="css/price_range_style.css">

  
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
        <h2>Browse Listings</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Browse Listings</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 shop-page-section">
      <div class="container px-3">
        <div class="row g-xl-4">
          <div class="col-12 col-xl-3">
            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter"
              class="btn btn-dark d-xl-none btn-filter-mobile rounded-bottom-0 d-flex align-items-center gap-2 px-4"><i
                class="bi bi-funnel"></i><span>Filter</span></button>
            <nav class="navbar navbar-expand-xl p-0">
              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasFilter"
                aria-labelledby="offcanvasFilterLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasFilterLabel">Filter</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div class="shop-filters">
                    <div class="card mb-4 rounded-3 border">
                      <div class="card-body">
                        <div class="selected-fillters">
                          <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Filter</h6>
                            <a href="javascript:;" class="link-secondary text-decoration-underline font-14">Clear
                              all</a>
                          </div>
                          <div class="d-flex align-items-center flex-wrap gap-2">
                            <button
                              class="btn btn-sm border btn-outline-dark px-3 d-flex align-items-center gap-1 rounded-5"><span>Prams</span><i
                                class="bi bi-x-lg"></i></button>
                            <button
                              class="btn btn-sm border btn-outline-dark px-3 d-flex align-items-center gap-1 rounded-5"><span>Bugaboo</span><i
                                class="bi bi-x-lg"></i></button>
                            <button
                              class="btn btn-sm border btn-outline-dark px-3 d-flex align-items-center gap-1 rounded-5"><span>Good Condition</span><i
                                class="bi bi-x-lg"></i></button>
                            <button
                              class="btn btn-sm border btn-outline-dark px-3 d-flex align-items-center gap-1 rounded-5"><span>Johannesburg</span><i
                                class="bi bi-x-lg"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded-3 mb-4 border">
                      <div class="card-body p-4">
                        <div class="categories-filter">
                          <h5 class="mb-3">Categories</h5>
                          <div class="list-group list-group-flush mb-0 gap-2">
                            <a href="javascript::"
                              class="list-group-item d-flex align-items-center justify-content-between p-0 border-bottom-0">
                              <span class="category-name">Prams &amp; Strollers</span>
                              <span class="category-number">142</span>
                            </a>
                            <a href="javascript::"
                              class="list-group-item d-flex align-items-center justify-content-between p-0 border-bottom-0">
                              <span class="category-name">Bassinets</span>
                              <span class="category-number">87</span>
                            </a>
                            <a href="javascript::"
                              class="list-group-item d-flex align-items-center justify-content-between p-0 border-bottom-0">
                              <span class="category-name">Nursery Furniture</span>
                              <span class="category-number">156</span>
                            </a>
                            <a href="javascript::"
                              class="list-group-item d-flex align-items-center justify-content-between p-0 border-bottom-0">
                              <span class="category-name">Breast Pumps</span>
                              <span class="category-number">94</span>
                            </a>
                            <a href="javascript::"
                              class="list-group-item d-flex align-items-center justify-content-between p-0 border-bottom-0">
                              <span class="category-name">Car Seats</span>
                              <span class="category-number">118</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded-3 mb-4 border">
                      <div class="card-body p-4">
                        <div class="price-filter">
                          <div id="slider-range"></div>
                          <div class="d-flex align-items-center justify-content-center gap-3">
                            <input class="form-control" type="number" min=0 max="9900"
                              oninput="validity.valid||(value='0');" id="min_price">
                            <input class="form-control" type="number" min=0 max="10000"
                              oninput="validity.valid||(value='10000');" id="max_price">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded-3 mb-4 border">
                      <div class="card-body p-4">
                        <div class="size-filter">
                          <h5 class="mb-3">Age Range</h5>
                          <div class="product-size-list d-flex align-items-center flex-wrap gap-3">
                            <div class="product-size-list-item">
                              <input type="radio" class="btn-check" name="options-size" id="size-option1">
                              <label class="btn btn-outline-dark btn-product-size" for="size-option1">0-6m</label>
                            </div>
                            <div class="product-size-list-item">
                              <input type="radio" class="btn-check" name="options-size" id="size-option2">
                              <label class="btn btn-outline-dark btn-product-size" for="size-option2">6-12m</label>
                            </div>
                            <div class="product-size-list-item">
                              <input type="radio" class="btn-check" name="options-size" id="size-option3" checked>
                              <label class="btn btn-outline-dark btn-product-size" for="size-option3">1-2y</label>
                            </div>
                            <div class="product-size-list-item">
                              <input type="radio" class="btn-check" name="options-size" id="size-option4">
                              <label class="btn btn-outline-dark btn-product-size" for="size-option4">2-3y</label>
                            </div>
                            <div class="product-size-list-item">
                              <input type="radio" class="btn-check" name="options-size" id="size-option5">
                              <label class="btn btn-outline-dark btn-product-size" for="size-option5">3-4y</label>
                            </div>
                            <div class="product-size-list-item">
                              <input type="radio" class="btn-check" name="options-size" id="size-option6">
                              <label class="btn btn-outline-dark btn-product-size" for="size-option6">4y+</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded-3 mb-4 border">
                      <div class="card-body p-4">
                        <div class="stock-filter">
                          <h5 class="mb-3">Brands</h5>
                          <div class="form-check mb-2 align-items-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand1">
                            <label class="form-check-label" for="flexCheckBrand1">Bugaboo (6)</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand2">
                            <label class="form-check-label" for="flexCheckBrand2">Chicco (5)</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand3">
                            <label class="form-check-label" for="flexCheckBrand3">Medela (4)</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand4">
                            <label class="form-check-label" for="flexCheckBrand4">Nuna (3)</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand5">
                            <label class="form-check-label" for="flexCheckBrand5">Maxi-Cosi (3)</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand6">
                            <label class="form-check-label" for="flexCheckBrand6">Chelino Baby (2)</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand7">
                            <label class="form-check-label" for="flexCheckBrand7">Tommee Tippee (2)</label>
                          </div>
                          <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckBrand8">
                            <label class="form-check-label" for="flexCheckBrand8">Pampers (1)</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded-3 mb-4 border">
                      <div class="card-body p-4">
                        <div class="color-filter">
                          <h5 class="mb-3">Condition</h5>
                          <div class="product-colors">
                            <div class="form-check mb-2 align-items-center">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckLikeNew">
                              <label class="form-check-label" for="flexCheckLikeNew">Like New</label>
                            </div>
                            <div class="form-check mb-2">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckGood">
                              <label class="form-check-label" for="flexCheckGood">Good</label>
                            </div>
                            <div class="form-check mb-2">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckFair">
                              <label class="form-check-label" for="flexCheckFair">Fair</label>
                            </div>
                            <div class="form-check mb-2">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckUsed">
                              <label class="form-check-label" for="flexCheckUsed">Well Loved</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded-3 mb-0 border">
                      <div class="card-body p-4">
                        <div class="stock-filter">
                          <h5 class="mb-3">Listing Status</h5>
                          <div class="form-check mb-2 align-items-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckInstock" checked>
                            <label class="form-check-label" for="flexCheckInstock">Available</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckOutofStock">
                            <label class="form-check-label" for="flexCheckOutofStock">Reserved</label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckOnSale">
                            <label class="form-check-label" for="flexCheckOnSale">Price Reduced</label>
                          </div>
                          <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckFreedelivery">
                            <label class="form-check-label" for="flexCheckFreedelivery">Collection Available</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-12 col-xl-9">
            <div class="shop-products">
              <div
                class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 gap-sm-0 mb-4">
                <div>
                  <p class="mb-0">Found <span class="fw-semibold">5</span> listings</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <p class="mb-0 fw-semibold">Sort by:</p>
                  <div class="dropdown">
                    <a class="btn btn-outline-dark border dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between px-3 w-220"
                      href="javascript:;" data-bs-toggle="dropdown">
                      Recently Added<span><i class="bi bi-chevron-down"></i></span>
                    </a>
                    <ul class="dropdown-menu p-2 w-220">
                      <li><a class="dropdown-item rounded" href="javascript:;">Recently Added</a></li>
                      <li><a class="dropdown-item rounded" href="javascript:;">Price: Low to High</a></li>
                      <li><a class="dropdown-item rounded" href="javascript:;">Price: High to Low</a></li>
                      <li><a class="dropdown-item rounded" href="javascript:;">Nearest to Me</a></li>
                      <li><a class="dropdown-item rounded" href="javascript:;">Best Condition</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
                            <div class="product-card-list">
                <div class="row g-4">
                  <div class="col-12 col-lg-4">
                    <a href="product-detail.php">
                      <img src="images/gallery/tabular-product/car-seat.jpg" class="product-img img-fluid rounded-3" alt="Group 0+ Car Seat">
                    </a>
                  </div>
                  <div class="col-12 col-lg-8">
                    <h3 class="product-name mb-1">Group 0+ Car Seat</h3>
                    <p class="mb-0 product-price d-flex align-items-center gap-2"><span class="prev-price text-decoration-line-through">R 3,500</span>R 1,650</p>
                    <p class="product-short-desc mt-3 mb-4"><?= htmlspecialchars($products['car-seat']['short_desc']) ?></p>
                    <p class="mb-2"><span class="badge bg-light text-dark border me-2">Good Condition</span><span class="badge bg-light text-dark border">Johannesburg</span></p>
                    <div class="d-flex flex-column flex-xl-row align-items-xl-center gap-3 mt-4">
                      <div class="product-cart">
                        <a href="product-detail.php" class="btn btn-dark rounded-5 px-5 w-300">View Listing</a>
                      </div>
                      <div class="product-actions">
                        <div class="d-flex flex-row gap-2">
<a href="javascript:;" class="btn btn-outline-dark border btn-action"><i class="bi bi-funnel"></i></a>
                          <a href="javascript:;" class="btn btn-outline-dark border btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="my-4 border-1 border-top"></div>
              <div class="product-card-list">
                <div class="row g-4">
                  <div class="col-12 col-lg-4">
                    <a href="product-detail.php">
                      <img src="images/gallery/tabular-product/07.png" class="product-img img-fluid rounded-3" alt="Ergonomic Baby Carrier">
                    </a>
                  </div>
                  <div class="col-12 col-lg-8">
                    <h3 class="product-name mb-1">Ergonomic Baby Carrier</h3>
                    <p class="mb-0 product-price d-flex align-items-center gap-2"><span class="prev-price text-decoration-line-through">R 3,500</span>R 1,650</p>
                    <p class="product-short-desc mt-3 mb-4">BabyBjörn carrier from weekend walks with our toddler. Washable insert, no tears in the fabric.</p>
                    <p class="mb-2"><span class="badge bg-light text-dark border me-2">Good Condition</span><span class="badge bg-light text-dark border">Johannesburg</span></p>
                    <div class="d-flex flex-column flex-xl-row align-items-xl-center gap-3 mt-4">
                      <div class="product-cart">
                        <a href="product-detail.php" class="btn btn-dark rounded-5 px-5 w-300">View Listing</a>
                      </div>
                      <div class="product-actions">
                        <div class="d-flex flex-row gap-2">
<a href="javascript:;" class="btn btn-outline-dark border btn-action"><i class="bi bi-funnel"></i></a>
                          <a href="javascript:;" class="btn btn-outline-dark border btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="my-4 border-1 border-top"></div>
              <div class="product-card-list">
                <div class="row g-4">
                  <div class="col-12 col-lg-4">
                    <a href="product-detail.php">
                      <img src="images/gallery/products/recommended/chicco-pram.png" class="product-img img-fluid rounded-3" alt="Compact Baby Pram">
                    </a>
                  </div>
                  <div class="col-12 col-lg-8">
                    <h3 class="product-name mb-1">Compact Baby Pram</h3>
                    <p class="mb-0 product-price">R 4,500</p>
                    <a href="seller-profile.php" class="listing-seller d-inline-flex align-items-center gap-2 text-decoration-none mt-2">
                      <img src="images/gallery/sellers/sarah-m.jpg" class="seller-avatar" alt="Sarah M." width="36" height="36" loading="lazy">
                      <span class="seller-rating-mini">Sarah M. · 4.9 · Sandton, Johannesburg</span>
                    </a>
                    <p class="product-short-desc mt-3 mb-4"><?= htmlspecialchars($products['chicco-pram']['short_desc']) ?></p>
                    <p class="mb-2"><span class="badge bg-light text-dark border me-2">Good Condition</span><span class="badge bg-light text-dark border">Johannesburg</span></p>
                    <div class="d-flex flex-column flex-xl-row align-items-xl-center gap-3 mt-4">
                      <div class="product-cart">
                        <a href="product-detail.php" class="btn btn-dark rounded-5 px-5 w-300">View Listing</a>
                      </div>
                      <div class="product-actions">
                        <div class="d-flex flex-row gap-2">
<a href="javascript:;" class="btn btn-outline-dark border btn-action"><i class="bi bi-funnel"></i></a>
                          <a href="javascript:;" class="btn btn-outline-dark border btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
                  </div>
                </div>
              </div>
              
                  </div>
                </div>
              </div>
              
                  </div>
                </div>
              </div>
              
          <div class="page-pagination">
            <nav class="mt-4">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="javascript:;"><i
                      class="bi bi-chevron-double-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:;"><i
                      class="bi bi-chevron-double-right"></i></a></li>
              </ul>
            </nav>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="js/price_range_script.js"></script>
  
  
  <script src="plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="js/search-slider.js"></script>
  <script src="js/search-modal.js"></script>
  
  <script src="js/product-details.js"></script>

  <script src="js/main.js"></script>
</body>

</html>