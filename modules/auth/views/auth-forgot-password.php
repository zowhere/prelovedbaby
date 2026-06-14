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
        <h2>Create an account</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Create an account</li>
          </ol>
        </nav>
      </div>
    </section>
    
    
    <section class="py-5">
        <div class="container px-3">
           <div class="row g-4 g-lg-5 align-items-center">
             <div class="col-12 col-xl-6">
               <div class="auth-register p-4 p-sm-5 rounded-3 border">
                  <h4 class="mb-0">Forgot Password</h4>
                  <p>Enter your registered email ID to reset the password</p>
                  <div class="form-body mt-5">
                    <div class="row row-cols-1 g-3">
                       <div class="col">
                          <label for="EmailAddress" class="form-label">Email address</label>
                          <input type="email" class="form-control form-control-lg border-2" id="EmailAddress">
                       </div>
                      <div class="col">
                        <div class="d-grid gap-3">
                          <a href="javascript:;" class="btn btn-dark btn-lg px-4 rounded-3"><span class="fs-6">Send</span></a>
                          <a href="auth-login.php" class="btn btn-outline-dark border btn-lg px-4 rounded-3"><span class="fs-6">Back to login</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
             </div> 
             <div class="col-12 col-xl-6 d-none d-xl-flex">
               <div class="auth-register-img">
                  <img src="images/gallery/auth/forgot-password.png" class="img-fluid" width="450" alt="">
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