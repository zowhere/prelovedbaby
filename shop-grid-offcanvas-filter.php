<!doctype html>
<html lang="en">
<?php require_once __DIR__ . '/includes/cart.php'; ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreLoved Baby</title>
  
	<link rel="icon" href="assets/images/favicon.png" type="image/png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" rel="stylesheet"
    media="all">

  <link rel="stylesheet" type="text/css" href="assets/css/price_range_style.css">

  
  <link rel="stylesheet" href="assets/plugins/swiper/css/swiper-bundle.min.css">

  
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
  
  <link href="assets/sass/style.css" rel="stylesheet">
  
</head>

<body>

  
  <?php include __DIR__ . '/includes/top-header.php'; ?>

<nav class="navbar navbar-expand-xl border-bottom py-3">
      <div class="container px-3">
        <a class="navbar-brand d-none d-xl-flex" href="index.html">
          <span class="logo-text">PreLoved Baby</span>
        </a>
        <button type="button" class="d-xl-none btn-menu-close" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar">
          <i class="bi bi-list"></i>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
          <div class="offcanvas-header">
            <span class="logo-text">PreLoved Baby</span>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="nav-search p-3 pt-0 border-bottom d-flex d-xl-none">
            <form class="position-relative w-100">
              <input type="text" class="form-control nav-search-control ps-5 border-0 py-2" placeholder="Search prams, bassinets, breast pumps & more">
              <span class="position-absolute top-50 start-0 translate-middle-y"><i class="bi bi-search fs-6 ms-3"></i></span>
           </form>
          </div>
          <div class="offcanvas-body p-0">
            <ul class="navbar-nav mx-auto gap-0 gap-xl-2">
              <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <span class="parent-menu-name">Home</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Browse Listings</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">All Listings</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Breast Pumps</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Prams &amp; Strollers</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Car Seats</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Nursery Furniture</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Bassinets</a></li>
                </ul>
                  </li>
              <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Baby Essentials</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <div class="dropdown-menu mega-menu p-lg-3 start-0 end-0 rounded-0">
                  <div class="container px-3">
                   <div class="row row-cols-1 row-cols-lg-3 g-3">
                    <div class="col">
                      <div class="list-group list-group-flush">
                        <h5 class="list-group-item mega-menu-title px-0 mb-0">Essential Baby Gear</h5>
                        <a href="shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Breast Pumps</a>
                        <a href="shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Prams &amp; Strollers</a>
                        <a href="shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Car Seats</a>
                        <a href="shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Nursery Furniture</a>
                        <a href="shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Bassinets</a>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group">
                        <div class="card border">
                          <div class="card-body p-2">
                            <div class="position-relative">
                              <img src="assets/images/gallery/categories/baby/breast-pumps.jpg" class="img-fluid rounded" alt="Branded breast pumps">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="shop-grid-left-sidebar.html" class="btn border bg-white px-4 rounded-3 w-100">Breast Pumps</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group">
                        <div class="card border">
                          <div class="card-body p-2">
                            <div class="position-relative">
                              <img src="assets/images/gallery/categories/baby/prams.jpg" class="img-fluid rounded" alt="Prams and pushchairs">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="shop-grid-left-sidebar.html" class="btn border bg-white px-4 rounded-3 w-100">Prams &amp; Pushchairs</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Become Seller</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="auth-register.html">Sell an Item</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>My Account</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="account-orders.html">My Orders</a></li>
                      <li><a class="dropdown-item" href="account-my-profile.html">My Profile</a></li>
                      <li><a class="dropdown-item" href="account-addresses.html">Delivery Addresses</a></li>
                      <li><a class="dropdown-item" href="account-payment-methods.html">Payment Methods</a></li>
</ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>Sign In / Join</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="auth-login.html">Login</a></li>
                      <li><a class="dropdown-item" href="auth-register.html">Register</a></li>
                      <li><a class="dropdown-item" href="auth-forgot-password.html">Forgot Password</a></li>
                    </ul>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="about-us.html">About Us</a></li>
                  <li><a class="dropdown-item" href="contact-us.html">Contact Us</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.html">
                  <span class="parent-menu-name">About</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact-us.html">
                  <span class="parent-menu-name">Contact</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="right-links nav gap-2 d-flex">
          <a class="nav-link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search"></i></a>
          <a class="nav-link" href="account-my-profile.html"><i class="bi bi-person-circle"></i></a>
<a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><?php include __DIR__ . '/includes/cart-nav-badge.php'; ?></a>
        </div>
      </div>
    </nav>
    

  
  <main class="main-content">

    
    <section class="section-breadcrumb bg-img-page-header d-flex align-items-center justify-content-center">
      <div class="container px-3 d-flex flex-column align-items-center justify-content-center">
        <h2>Browse Listings</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Browse Listings</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 shop-page-section">
      <div class="container px-3">

        
          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter"
              class="btn btn-dark btn-filter-mobile rounded-bottom-0 d-flex align-items-center gap-2 px-4"><i
                class="bi bi-funnel"></i><span>Filter</span></button>

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
           

            <div class="shop-products">
              <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 gap-sm-0 mb-4">
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
              <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Like New</span>
                        <a href="product-detail.html">
                          <img src="assets/images/gallery/products/recommended/chicco-pram.png" class="product-img img-fluid rounded-3" alt="Compact Baby Pram" loading="lazy" decoding="async">
                        </a>
                        <div class="position-absolute top-0 end-0 m-3 product-actions">
                          <div class="d-flex flex-column gap-2">
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-funnel"></i></a>
                            <a href="javascript:;" class="btn btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                          </div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                          <a href="product-detail.html" class="btn btn-dark rounded-5 w-100">View Listing</a>
                        </div>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Compact Baby Pram</h3>
                        <p class="mb-1 product-price">R 4,500</p>
                        <a href="seller-profile.html" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="assets/images/gallery/sellers/sarah-m.jpg" class="seller-avatar" alt="Sarah M." width="36" height="36" loading="lazy">
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
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Like New</span>
                        <a href="product-detail.html">
                          <img src="assets/images/gallery/products/recommended/breast-pump.png" class="product-img img-fluid rounded-3" alt="Electric Breast Pump" loading="lazy" decoding="async">
                        </a>
                        <div class="position-absolute top-0 end-0 m-3 product-actions">
                          <div class="d-flex flex-column gap-2">
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-funnel"></i></a>
                            <a href="javascript:;" class="btn btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                          </div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                          <a href="product-detail.html" class="btn btn-dark rounded-5 w-100">View Listing</a>
                        </div>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Medela</p>
                        <h3 class="product-name mb-1">Electric Breast Pump</h3>
                        <p class="mb-1 product-price">R 2,800</p>
                        <a href="seller-profile.html" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="assets/images/gallery/sellers/lerato-n.jpg" class="seller-avatar" alt="Lerato N." width="36" height="36" loading="lazy">
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
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Good</span>
                        <a href="product-detail.html">
                          <img src="assets/images/gallery/products/recommended/baby-cot.png" class="product-img img-fluid rounded-3" alt="Wooden Baby Cot" loading="lazy" decoding="async">
                        </a>
                        <div class="position-absolute top-0 end-0 m-3 product-actions">
                          <div class="d-flex flex-column gap-2">
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-funnel"></i></a>
                            <a href="javascript:;" class="btn btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                          </div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                          <a href="product-detail.html" class="btn btn-dark rounded-5 w-100">View Listing</a>
                        </div>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Stokke</p>
                        <h3 class="product-name mb-1">Wooden Baby Cot</h3>
                        <p class="mb-1 product-price">R 3,200</p>
                        <a href="seller-profile.html" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="assets/images/gallery/sellers/priya-s.jpg" class="seller-avatar" alt="Priya K." width="36" height="36" loading="lazy">
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
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Like New</span>
                        <a href="product-detail.html">
                          <img src="assets/images/gallery/products/recommended/car-seat.jpg" class="product-img img-fluid rounded-3" alt="Group 0+ Car Seat" loading="lazy" decoding="async">
                        </a>
                        <div class="position-absolute top-0 end-0 m-3 product-actions">
                          <div class="d-flex flex-column gap-2">
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-funnel"></i></a>
                            <a href="javascript:;" class="btn btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                          </div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                          <a href="product-detail.html" class="btn btn-dark rounded-5 w-100">View Listing</a>
                        </div>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Nuna</p>
                        <h3 class="product-name mb-1">Group 0+ Car Seat</h3>
                        <p class="mb-1 product-price">R 3,500</p>
                        <a href="seller-profile.html" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="assets/images/gallery/sellers/thabo-m.jpg" class="seller-avatar" alt="Thabo M." width="36" height="36" loading="lazy">
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
                <div class="col">
                  <div class="product-card product-card--listing border rounded-3 p-3">
                    <div class="d-flex flex-column gap-3">
                      <div class="position-relative product-img-wrap">
                        <span class="listing-condition-badge position-absolute top-0 start-0 m-3">Good</span>
                        <a href="product-detail.html">
                          <img src="assets/images/gallery/products/recommended/high-chair.png" class="product-img img-fluid rounded-3" alt="Convertible High Chair" loading="lazy" decoding="async">
                        </a>
                        <div class="position-absolute top-0 end-0 m-3 product-actions">
                          <div class="d-flex flex-column gap-2">
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;" class="btn btn-action"><i class="bi bi-funnel"></i></a>
                            <a href="javascript:;" class="btn btn-action" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-eye"></i></a>
                          </div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                          <a href="product-detail.html" class="btn btn-dark rounded-5 w-100">View Listing</a>
                        </div>
                      </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Convertible High Chair</h3>
                        <p class="mb-1 product-price">R 1,800</p>
                        <a href="seller-profile.html" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="assets/images/gallery/sellers/chris-w.jpg" class="seller-avatar" alt="Chris W." width="36" height="36" loading="lazy">
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
              src="assets/images/gallery/payment/stripe.png"
              class="img-fluid"
              width="40"
              alt="Stripe"
          /></a>
        </div>
      </div>
      
    </div>
  </footer>
  

  
  <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
  

  
  <?php include __DIR__ . '/includes/cart-offcanvas.php'; ?>
  

  
  <?php include __DIR__ . '/includes/search-modal.php'; ?>
  

  
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="assets/js/price_range_script.js"></script>

  
  <script src="assets/plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="assets/js/search-slider.js"></script>
  <script src="assets/js/search-modal.js"></script>
  
  <script src="assets/js/product-details.js"></script>

  <script src="assets/js/main.js"></script>
</body>

</html>