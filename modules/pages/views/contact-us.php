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
        <h2>Contact Us</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Contact Us</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5">
      <div class="container px-3">
        <div class="row g-4 g-lg-5">
           <div class="col-12 col-lg-8">
              <div class="contact-map border rounded-3 p-3 overflow-x-auto">
                <iframe src="https://maps.google.com/maps?q=1+River+Lane,+Mowbray,+Cape+Town,+South+Africa&hl=en&z=15&output=embed" width="800" class="rounded-3" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="PreLoved Baby location in Mowbray, Cape Town"></iframe>
              </div>
           </div>
           <div class="col-12 col-lg-4">
            <div class="contact-details">
              <h4 class="mb-4">Information</h4>
              <div class="contact-number">
                <p class="mb-1 fw-semibold">Phone:</p>
                <p class="mb-0"><a href="tel:+271112345678" class="text-decoration-none text-body">011 12345678</a></p>
              </div>
              <div class="border-top my-3"></div>
              <div class="contact-number mt-3">
                <p class="mb-1 fw-semibold">Email:</p>
                <p class="mb-0"><a href="mailto:info@prelovedbaby.co.za" class="text-decoration-none text-body">info@prelovedbaby.co.za</a></p>
              </div>
              <div class="border-top my-3"></div>
              <div class="contact-number mt-3">
                <p class="mb-1 fw-semibold">Address:</p>
                <p class="mb-0">1 River Lane,<br> Mowbray, Cape Town</p>
              </div>
              <div class="border-top my-3"></div>
              <div class="contact-number mt-3">
                <p class="mb-1 fw-semibold">Open Time:</p>
                <p class="mb-0">Mon-Sat, 8am to 5pm</p>
              </div>
            </div>
           </div>
        </div>
        

        <div class="card mt-5 border rounded-3">
          <div class="card-body p-5">
            <div class="text-center mb-5">
              <h4>Get In Touch</h4>
              <p>Fill out the form below to contact our sales team.</p>
            </div>
            <form class="contact-form">
              <div class="row g-3">
                 <div class="col-12 col-lg-6">
                  <div>
                    <label for="YourName" class="form-label">Your Name</label>
                    <input type="text" class="form-control form-control-lg border-2" id="YourName" required placeholder="Enter your name">
                  </div>
                 </div>
                 <div class="col-12 col-lg-6">
                  <div>
                    <label for="EmailAddress" class="form-label">Email Address</label>
                    <input type="email" class="form-control form-control-lg border-2" id="EmailAddress" required placeholder="Enter Email Address">
                  </div>
                 </div>
                 <div class="col-12 col-lg-12">
                  <div>
                    <label for="Message" class="form-label">Message</label>
                    <textarea class="form-control form-control-lg border-2" rows="4" cols="5" id="Message" required placeholder="Message"></textarea>
                  </div>
                 </div>
                 <div class="col-12 col-lg-12">
                  <div>
                    <button type="submit" class="btn btn-dark px-4 py-2">Send Message</button>
                  </div>
                 </div>

              </div>
            </form>
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