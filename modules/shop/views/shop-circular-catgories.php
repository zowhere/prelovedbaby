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
        <h2>Categories</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Categories</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 shop-page-section">
      <div class="container px-3">
         <div class="shop-categories">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 g-4 g-lg-5">
              <div class="col">
                <div class="category-card">
                  <a href="shop-grid-left-sidebar.php">
                    <img src="images/gallery/categories/baby/breast-pumps.jpg" class="rounded-circle img-fluid product-img border p-2" alt="Branded breast pumps">
                  </a>
                  <div class="mt-3 text-center">
                    <h5 class="mb-1">Breast Pumps</h5>
                    <p class="mb-0">Medela, Spectra &amp; more</p>
                  </div>
                  <div class="d-grid mt-3">
                    <a href="shop-grid-left-sidebar.php" class="btn btn-outline-dark border border-2 rounded-5 d-flex align-items-center justify-content-center gap-2 py-2"><span>Browse Listings</span><i class="bi bi-arrow-up-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="category-card">
                  <a href="shop-grid-left-sidebar.php">
                    <img src="images/gallery/categories/baby/prams.jpg" class="rounded-circle img-fluid product-img border p-2" alt="Prams & Strollers">
                  </a>
                  <div class="mt-3 text-center">
                    <h5 class="mb-1">Prams & Strollers</h5>
                    <p class="mb-0">24 Listings</p>
                  </div>
                  <div class="d-grid mt-3">
                    <a href="shop-grid-left-sidebar.php" class="btn btn-outline-dark border border-2 rounded-5 d-flex align-items-center justify-content-center gap-2 py-2"><span>Browse Listings</span><i class="bi bi-arrow-up-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="category-card">
                  <a href="shop-grid-left-sidebar.php">
                    <img src="images/gallery/categories/baby/car-seats.jpg" class="rounded-circle img-fluid product-img border p-2" alt="Car Seats">
                  </a>
                  <div class="mt-3 text-center">
                    <h5 class="mb-1">Car Seats</h5>
                    <p class="mb-0">22 Listings</p>
                  </div>
                  <div class="d-grid mt-3">
                    <a href="shop-grid-left-sidebar.php" class="btn btn-outline-dark border border-2 rounded-5 d-flex align-items-center justify-content-center gap-2 py-2"><span>Browse Listings</span><i class="bi bi-arrow-up-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="category-card">
                  <a href="shop-grid-left-sidebar.php">
                    <img src="images/gallery/categories/baby/nursery-furniture.jpg" class="rounded-circle img-fluid product-img border p-2" alt="Nursery Furniture">
                  </a>
                  <div class="mt-3 text-center">
                    <h5 class="mb-1">Nursery Furniture</h5>
                    <p class="mb-0">31 Listings</p>
                  </div>
                  <div class="d-grid mt-3">
                    <a href="shop-grid-left-sidebar.php" class="btn btn-outline-dark border border-2 rounded-5 d-flex align-items-center justify-content-center gap-2 py-2"><span>Browse Listings</span><i class="bi bi-arrow-up-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="category-card">
                  <a href="shop-grid-left-sidebar.php">
                    <img src="images/gallery/categories/baby/bassinets.jpg" class="rounded-circle img-fluid product-img border p-2" alt="Bassinets">
                  </a>
                  <div class="mt-3 text-center">
                    <h5 class="mb-1">Bassinets</h5>
                    <p class="mb-0">15 Listings</p>
                  </div>
                  <div class="d-grid mt-3">
                    <a href="shop-grid-left-sidebar.php" class="btn btn-outline-dark border border-2 rounded-5 d-flex align-items-center justify-content-center gap-2 py-2"><span>Browse Listings</span><i class="bi bi-arrow-up-right"></i></a>
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
  

  
  <script src="js/bootstrap.bundle.min.js"></script>
  
</body>

</html>