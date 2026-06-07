<!doctype html>
<html lang="en">
<?php require_once __DIR__ . '/includes/cart.php'; ?>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PreLoved Baby</title>
    
    <link rel="icon" href="assets/images/favicon.png" type="image/png" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />

    
    
    <link
      rel="stylesheet"
      href="assets/plugins/swiper/css/swiper-bundle.min.css"
    />

    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css" />
    
    <link href="assets/sass/style.css" rel="stylesheet" />
  </head>

  <body>
    
    <?php include __DIR__ . '/includes/top-header.php'; ?>

<nav class="navbar navbar-expand-xl border-bottom py-3">
      <div class="container px-3">
        <a class="navbar-brand d-none d-xl-flex" href="index.html">
          <span class="logo-text">PreLoved Baby</span>
        </a>
        <button
          type="button"
          class="d-xl-none btn-menu-close"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
        >
          <i class="bi bi-list"></i>
        </button>
        <div
          class="offcanvas offcanvas-start"
          tabindex="-1"
          id="offcanvasNavbar"
        >
          <div class="offcanvas-header">
            <span class="logo-text">PreLoved Baby</span>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="nav-search p-3 pt-0 border-bottom d-flex d-xl-none">
            <form class="position-relative w-100">
              <input
                type="text"
                class="form-control nav-search-control ps-5 border-0 py-2"
                placeholder="Search prams, bassinets, breast pumps & more"
              />
              <span class="position-absolute top-50 start-0 translate-middle-y"
                ><i class="bi bi-search fs-6 ms-3"></i
              ></span>
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
                <a
                  class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                  href="javascript:;"
                  data-bs-toggle="dropdown"
                >
                  <span class="parent-menu-name">Browse Listings</span>
                  <span class="parent-menu-icon ms-2"
                    ><i class="bi bi-chevron-down"></i
                  ></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="shop-grid-left-sidebar.html"
                      >All Listings</a
                    >
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="shop-grid-left-sidebar.html"
                      >Breast Pumps</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="shop-grid-left-sidebar.html"
                      >Prams &amp; Strollers</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="shop-grid-left-sidebar.html"
                      >Car Seats</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="shop-grid-left-sidebar.html"
                      >Nursery Furniture</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="shop-grid-left-sidebar.html"
                      >Bassinets</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown position-static">
                <a
                  class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                  href="javascript:;"
                  data-bs-toggle="dropdown"
                >
                  <span class="parent-menu-name">Baby Essentials</span>
                  <span class="parent-menu-icon ms-2"
                    ><i class="bi bi-chevron-down"></i
                  ></span>
                </a>
                <div
                  class="dropdown-menu mega-menu p-lg-3 start-0 end-0 rounded-0"
                >
                  <div class="container px-3">
                    <div class="row row-cols-1 row-cols-lg-3 g-3">
                      <div class="col">
                        <div class="list-group list-group-flush">
                          <h5 class="list-group-item mega-menu-title px-0 mb-0">
                            Essential Baby Gear
                          </h5>
                          <a
                            href="shop-grid-left-sidebar.html"
                            class="list-group-item mega-menu-link px-0"
                            >Breast Pumps</a
                          >
                          <a
                            href="shop-grid-left-sidebar.html"
                            class="list-group-item mega-menu-link px-0"
                            >Prams &amp; Strollers</a
                          >
                          <a
                            href="shop-grid-left-sidebar.html"
                            class="list-group-item mega-menu-link px-0"
                            >Car Seats</a
                          >
                          <a
                            href="shop-grid-left-sidebar.html"
                            class="list-group-item mega-menu-link px-0"
                            >Nursery Furniture</a
                          >
                          <a
                            href="shop-grid-left-sidebar.html"
                            class="list-group-item mega-menu-link px-0"
                            >Bassinets</a
                          >
                        </div>
                      </div>
                      <div class="col">
                        <div class="list-group">
                          <div class="card border">
                            <div class="card-body p-2">
                              <div class="position-relative">
                                <img
                                  src="assets/images/gallery/categories/baby/breast-pumps.jpg"
                                  class="img-fluid rounded"
                                  alt="Branded breast pumps"
                                />
                                <div
                                  class="position-absolute bottom-0 end-0 start-0 m-3"
                                >
                                  <a
                                    href="shop-grid-left-sidebar.html"
                                    class="btn border bg-white px-4 rounded-3 w-100"
                                    >Breast Pumps</a
                                  >
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
                                <img
                                  src="assets/images/gallery/categories/baby/prams.jpg"
                                  class="img-fluid rounded"
                                  alt="Prams and pushchairs"
                                />
                                <div
                                  class="position-absolute bottom-0 end-0 start-0 m-3"
                                >
                                  <a
                                    href="shop-grid-left-sidebar.html"
                                    class="btn border bg-white px-4 rounded-3 w-100"
                                    >Prams &amp; Pushchairs</a
                                  >
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
                <a
                  class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                  href="javascript:;"
                  data-bs-toggle="dropdown"
                >
                  <span class="parent-menu-name">Become Seller</span>
                  <span class="parent-menu-icon ms-2"
                    ><i class="bi bi-chevron-down"></i
                  ></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="auth-register.php"
                      >Sell an Item</a
                    >
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between"
                      href="javascript:;"
                      data-bs-toggle="dropdown"
                    >
                      <span>My Account</span>
                      <span><i class="bi bi-chevron-right"></i></span>
                    </a>
                    <ul class="dropdown-menu submenu">
                      <li>
                        <a class="dropdown-item" href="account-orders.html"
                          >My Orders</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="account-my-profile.html"
                          >My Profile</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="account-addresses.html"
                          >Delivery Addresses</a
                        >
                      </li>
                      <li>
                        <a
                          class="dropdown-item"
                          href="account-payment-methods.html"
                          >Payment Methods</a
                        >
                      </li>
</ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between"
                      href="javascript:;"
                      data-bs-toggle="dropdown"
                    >
                      <span>Sign In / Join</span>
                      <span><i class="bi bi-chevron-right"></i></span>
                    </a>
                    <ul class="dropdown-menu submenu">
                      <li>
                        <a class="dropdown-item" href="auth-login.html"
                          >Login</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="auth-register.html"
                          >Register</a
                        >
                      </li>
                      <li>
                        <a
                          class="dropdown-item"
                          href="auth-forgot-password.html"
                          >Forgot Password</a
                        >
                      </li>
                    </ul>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="about-us.html">About Us</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="contact-us.html"
                      >Contact Us</a
                    >
                  </li>
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
        <div class="right-links nav gap-2 d-flex align-items-center">
          <a class="btn btn-dark btn-sm rounded-3 px-3 py-2 d-none d-md-inline-flex" href="admin/index.php">Admin Dashboard</a>
          <a
            class="nav-link"
            href="javascript:;"
            data-bs-toggle="modal"
            data-bs-target="#searchModal"
            ><i class="bi bi-search"></i
          ></a>
          <a class="nav-link" href="account-my-profile.html"
            ><i class="bi bi-person-circle"></i
          ></a>
          <a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><?php include __DIR__ . '/includes/cart-nav-badge.php'; ?></a>
        </div>
      </div>
    </nav>

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
                    href="shop-grid-left-sidebar.php"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>
            <img
              src="assets/images/gallery/slider/slide-1.png"
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
                    href="shop-grid-left-sidebar.html"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="assets/images/gallery/slider/slide-2.png"
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
                    href="shop-grid-left-sidebar.html"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="assets/images/gallery/slider/slide-3.png"
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
                    href="shop-grid-left-sidebar.html"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="assets/images/gallery/slider/slide-4.png"
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
                    href="shop-grid-left-sidebar.html"
                    class="btn btn-dark px-md-5 py-md-3 rounded-5"
                  >
                    Browse Listings
                  </a>
                </div>
              </div>
            </div>

            <img
              src="assets/images/gallery/slider/slide-5.png"
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
            <a href="shop-grid-catgories.html" class="btn btn-outline-dark px-4"
              >Browse Categories</a
            >
          </div>
          <div class="categories-catalog">
            <div class="swiper categories-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="shop-grid-catgories.html">
                    <div class="d-flex flex-column align-items-center gap-3">
                      <img
                        src="assets/images/gallery/categories/baby/breast-pumps.jpg"
                        class="cat-img img-fluid rounded-circle"
                        alt="Branded breast pumps"
                      />
                      <div class="text-center">
                        <h3 class="cat-title mb-0">Breast Pumps</h3>
                        <p class="mb-0 cat-number">Medela, Spectra &amp; more</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="shop-grid-catgories.html">
                    <div class="d-flex flex-column align-items-center gap-3">
                      <img
                        src="assets/images/gallery/categories/baby/prams.jpg"
                        class="cat-img img-fluid rounded-circle"
                        alt="Prams and strollers"
                      />
                      <div class="text-center">
                        <h3 class="cat-title mb-0">Prams & Strollers</h3>
                        <p class="mb-0 cat-number">24 Listings</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="shop-grid-catgories.html">
                    <div class="d-flex flex-column align-items-center gap-3">
                      <img
                        src="assets/images/gallery/categories/baby/car-seats.jpg"
                        class="cat-img img-fluid rounded-circle"
                        alt="Car seats"
                      />
                      <div class="text-center">
                        <h3 class="cat-title mb-0">Car Seats</h3>
                        <p class="mb-0 cat-number">22 Listings</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="shop-grid-catgories.html">
                    <div class="d-flex flex-column align-items-center gap-3">
                      <img
                        src="assets/images/gallery/categories/baby/nursery-furniture.jpg"
                        class="cat-img img-fluid rounded-circle"
                        alt="Nursery furniture"
                      />
                      <div class="text-center">
                        <h3 class="cat-title mb-0">Nursery Furniture</h3>
                        <p class="mb-0 cat-number">31 Listings</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="shop-circular-catgories.html">
                    <div class="d-flex flex-column align-items-center gap-3">
                      <img
                        src="assets/images/gallery/categories/baby/bassinets.jpg"
                        class="cat-img img-fluid rounded-circle"
                        alt="Bassinets"
                      />
                      <div class="text-center">
                        <h3 class="cat-title mb-0">Bassinets</h3>
                        <p class="mb-0 cat-number">15 Listings</p>
                      </div>
                    </div>
                  </a>
                </div>
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
                  <div class="featured-img-wrap featured-img-wrap--compact">
                    <img
                      src="assets/images/gallery/deals/featured-bugaboo-stroller.jpg"
                      class="featured-img"
                      alt="Bugaboo stroller"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 12,500</p>
                  <a href="shop-grid-left-sidebar.html" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <div class="featured-img-wrap featured-img-wrap--compact">
                    <img
                      src="assets/images/gallery/deals/featured-nuna-stroller.jpg"
                      class="featured-img"
                      alt="Nuna Mixx stroller"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 8,900</p>
                  <a href="shop-grid-left-sidebar.html" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <div class="featured-img-wrap featured-img-wrap--compact featured-img-wrap--product">
                    <img
                      src="assets/images/gallery/products/recommended/bassinet.png"
                      class="featured-img"
                      alt="Smart bassinet"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 18,500</p>
                  <a href="shop-grid-left-sidebar.html" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border featured-listing-card">
                <div class="card-body text-center p-3">
                  <div class="featured-img-wrap featured-img-wrap--compact featured-img-wrap--product">
                    <img
                      src="assets/images/gallery/products/recommended/car-seat.jpg"
                      class="featured-img"
                      alt="Car seat"
                    />
                  </div>
                  <p class="featured-listing-price mb-0 mt-2">R 3,500</p>
                  <a href="shop-grid-left-sidebar.html" class="btn btn-dark btn-sm px-3 mt-2">View Listing</a>
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
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/pampers.svg" class="img-fluid brand-logo-img" alt="Pampers" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/chelino-baby.png" class="img-fluid brand-logo-img" alt="Chelino Baby" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/medela.svg" class="img-fluid brand-logo-img" alt="Medela" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/chicco.svg" class="img-fluid brand-logo-img" alt="Chicco" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/nuna.svg" class="img-fluid brand-logo-img" alt="Nuna" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/bugaboo.svg" class="img-fluid brand-logo-img" alt="Bugaboo" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/snoo.png" class="img-fluid brand-logo-img" alt="SNOO" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/huggies.svg" class="img-fluid brand-logo-img" alt="Huggies" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/tommee-tippee.svg" class="img-fluid brand-logo-img" alt="Tommee Tippee" />
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="shop-grid-left-sidebar.html" class="text-decoration-none">
                  <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="assets/images/gallery/brands/johnsons-baby.svg" class="img-fluid brand-logo-img" alt="Johnson's Baby" />
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
                src="assets/images/gallery/payment/stripe.png"
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
    

    
  <?php include __DIR__ . '/includes/cart-offcanvas.php'; ?>
  

    
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
                            src="assets/images/gallery/product-images/01.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <img
                            src="assets/images/gallery/product-images/02.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <img
                            src="assets/images/gallery/product-images/03.png"
                            class="img-fluid rounded-3"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <img
                            src="assets/images/gallery/product-images/04.png"
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
                    <a href="seller-profile.php" class="listing-seller d-inline-flex align-items-center gap-2 text-decoration-none">
                      <img src="<?= htmlspecialchars($qv['seller_avatar']) ?>" class="seller-avatar" alt="<?= htmlspecialchars($qv['seller']) ?>" width="36" height="36" loading="lazy">
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
    

    
  <?php include __DIR__ . '/includes/search-modal.php'; ?>
  

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/plugins/swiper/js/swiper-bundle.min.js"></script>
    <script src="assets/js/search-slider.js"></script>
  <script src="assets/js/search-modal.js"></script>
    
    <script src="assets/js/index.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
