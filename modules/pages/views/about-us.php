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
        <h2>About Us</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">About Us</li>
          </ol>
        </nav>
      </div>
    </section>
    

    <section class="py-5" id="how-it-works">
      <div class="container px-3">
        <div class="row g-4 g-lg-5">
          <div class="col-12 col-lg-6">
            <div class="about-img">
              <img src="images/gallery/pages/vision.jpg" class="img-fluid rounded-4 about-page-img" alt="Preloved baby essentials">
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="about-text">
              <h4>Welcome to PreLoved Baby Essentials</h4>
              <p>PreLoved Baby is where South African parents sell baby gear they've finished with: prams, cots, car seats, pumps, high chairs and the rest.</p>
              <p>It's cheaper than buying new, keeps good stuff out of landfill, and you deal directly with the person who used it.</p>
              <p>List an item in a few minutes. Browse by category, message the seller, pay securely, and collect or get it couriered.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="py-5">
      <div class="container px-3">
        <div class="row g-4 g-lg-5 align-items-center">
          <div class="col-12 col-lg-6">
            <img src="images/gallery/team/01.png" class="img-fluid rounded-4 about-page-img" alt="Zoe Bulle">
          </div>
          <div class="col-12 col-lg-6">
            <h2 class="section-title mb-3">Who runs this</h2>
            <p class="text-para mb-3">PreLoved Baby is run by Zoe Bulle from Johannesburg. It started because buying new baby gear is expensive and most of it barely gets used.</p>
            <p class="text-para mb-0">If something goes wrong with a listing, message us through the contact page and we'll help sort it out with the seller.</p>
          </div>
        </div>
      </div>
    </section>

    
    <section class="special-offer py-5">
      <div class="container px-3">
        <div class="d-flex align-items-center justify-content-center mb-4">
          <h2 class="section-title">Our Brands</h2>
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-4 justify-content-center">
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/chelino-baby.png" class="img-fluid brand-logo-img" alt="ChelinoBaby">
            </div>
          </div>
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/pampers.svg" class="img-fluid brand-logo-img" alt="Pampers">
            </div>
          </div>
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/snoo.png" class="img-fluid brand-logo-img" alt="SNOO">
            </div>
          </div>
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/medela.svg" class="img-fluid brand-logo-img" alt="Medela">
            </div>
          </div>
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/bugaboo.svg" class="img-fluid brand-logo-img" alt="Bugaboo">
            </div>
          </div>
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/nuna.svg" class="img-fluid brand-logo-img" alt="Nuna">
            </div>
          </div>
          <div class="col">
            <div class="brand-logo p-4 border rounded-3 h-100 d-flex align-items-center justify-content-center">
              <img src="images/gallery/brands/chicco.svg" class="img-fluid brand-logo-img" alt="Chicco">
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