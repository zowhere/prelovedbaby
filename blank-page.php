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
              <input type="text" class="form-control nav-search-control ps-5 border-0" placeholder="Search prams, bassinets, breast pumps & more">
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
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>Account</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="account-orders.html">Orders</a></li>
                      <li><a class="dropdown-item" href="account-my-profile.html">Profile</a></li>
                      <li><a class="dropdown-item" href="account-addresses.html">Addresses</a></li>
                      <li><a class="dropdown-item" href="account-payment-methods.html">Payment Methods</a></li>
</ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>Authentication</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="auth-login.html">Login</a></li>
                      <li><a class="dropdown-item" href="auth-register.html">Register</a></li>
                      <li><a class="dropdown-item" href="auth-forgot-password.html">Forgot Password</a></li>
                    </ul>
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
        <h2>Blank page</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Blank page</li>
          </ol>
        </nav>
      </div>
    </section>
    
    
    <section class="py-5">
        <div class="container px-3">
           <div class="d-flex align-items-center justify-content-center p-5">
            <div class="p-5">
              <h2 class="mb-0">I am Blank Page</h2>
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
  
  <script src="assets/plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="assets/js/search-slider.js"></script>
  <script src="assets/js/search-modal.js"></script>

  <script src="assets/js/main.js"></script>
</body>

</html>