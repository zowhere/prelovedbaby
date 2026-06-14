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
        <h2>My Profile</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">My Profile</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 my-account-section">
      <div class="container px-3">
        <div class="row g-lg-4">
          <div class="col-12 col-lg-3">
            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter"
              class="btn btn-dark d-lg-none btn-filter-mobile rounded-bottom-0 d-flex align-items-center gap-2 px-4"><i
                class="bi bi-funnel"></i><span>Account</span></button>
             <nav class="navbar navbar-expand-lg p-0">
              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasFilter"
                aria-labelledby="offcanvasFilterLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasFilterLabel">My account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div class="my-account-menu w-100 border rounded-3 p-3">
                    <div class="list-group list-group-flush">
                      <a href="account-orders.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-bag-check"></i></span>My Orders</a>
<a href="account-payment-methods.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-wallet"></i></span>Payment Methods</a>
                      <a href="javascript:;" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-star"></i></span>My Reviews</a>
                      <a href="account-my-profile.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3 active"><span><i class="bi bi-person-square"></i></span>My Profile</a>
                      <a href="account-addresses.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-geo-alt"></i></span>Addresses</a>
                      <a href="auth-login.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-box-arrow-left"></i></span>Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-12 col-lg-9">
            <div class="my-profile">
               <div class="card border-0 rounded-3 bg-light">
                 <div class="card-body p-4">
                    <h5 class="mb-4">My Information</h5>
                    <form>
                      <div class="row g-3">
                        <div class="col-12 col-lg-6">
                          <label for="FirstName" class="form-label">First Name</label>
                          <input type="text" class="form-control border-2 py-2" id="FirstName" value="Zandi">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="LastName" class="form-label">Last Name</label>
                          <input type="text" class="form-control border-2 py-2" id="LastName" value="Dube">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="emailid" class="form-label">Email ID</label>
                          <input type="text" class="form-control border-2 py-2" id="emailid" value="zandi.dube@gmail.com">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="PhoneNumber" class="form-label">Phone Number</label>
                          <input type="text" class="form-control border-2 py-2" id="PhoneNumber" value="0833603245">
                        </div>
                        <div class="col-12 col-lg-12">
                          <label for="SelectCountry" class="form-label">Country</label>
                          <select class="form-select border-2 py-2" id="SelectCountry">
                            <option selected>South Africa</option>
                            <option value="1">Namibia</option>
                            <option value="2">Botswana</option>
                            <option value="3">Zimbabwe</option>
                          </select>
                        </div>
                        <div class="col-12 col-lg-12">
                          <button type="button" class="btn btn-dark px-4 py-2">Save Changes</button>
                        </div>

                      </div>
                    </form>
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
  

  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

<script src="plugins/swiper/js/swiper-bundle.min.js"></script>
<script src="js/search-slider.js"></script>
  <script src="js/search-modal.js"></script>
  <script src="js/main.js"></script>
</body>

</html>