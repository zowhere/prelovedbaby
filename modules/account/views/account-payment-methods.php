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
        <h2>Payment Methods</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Payment Methods</li>
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
<a href="account-payment-methods.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3 active"><span><i class="bi bi-wallet"></i></span>Payment Methods</a>
                      <a href="javascript:;" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-star"></i></span>My Reviews</a>
                      <a href="account-my-profile.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-person-square"></i></span>My Profile</a>
                      <a href="account-addresses.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-geo-alt"></i></span>Addresses</a>
                      <a href="auth-login.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-box-arrow-left"></i></span>Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-12 col-lg-9">
            <div class="payment-methods-cards">
               <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4">
                   <div class="col d-flex">
                    <div class="card rounded-4 bg-black border w-100">
                      <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                             <img src="images/gallery/payment/visa.png" width="60" alt="">
                             <div class="dropdown">
                              <button class="btn btn-outline-light btn-sm border-light border-opacity-25 dropdown-toggle dropdown-toggle-nocaret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Edit</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Remove</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Set as Primary</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between mt-4">
                             <h6 class="mb-0 text-white">Zoe Bulle</h6>
                             <p class="mb-0 text-white">08/27</p>
                          </div>
                          <div class="mt-3">
                            <span class="fs-5 text-white">**** **** **** 4821</span>
                          </div>
                      </div>
                    </div>
                   </div>
                   <div class="col d-flex">
                    <div class="card rounded-4 bg-primary border w-100">
                      <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                             <img src="images/gallery/payment/money.png" width="50" alt="">
                             <div class="dropdown">
                              <button class="btn btn-outline-light btn-sm border-light border-opacity-25 dropdown-toggle dropdown-toggle-nocaret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Edit</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Remove</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Set as Primary</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between mt-4">
                             <h6 class="mb-0 text-white">Zoe Bulle</h6>
                             <p class="mb-0 text-white">03/28</p>
                          </div>
                          <div class="mt-3">
                            <span class="fs-5 text-white">**** **** **** 9034</span>
                          </div>
                      </div>
                    </div>
                   </div>
                   <div class="col d-flex">
                    <div class="card rounded-4 border w-100">
                      <div class="card-body d-flex align-items-center flex-column justify-content-center">
                         <div class="d-flex align-items-center flex-column justify-content-center gap-2">
                            <div class="">
                              <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" class="btn btn-outline-dark border"><i class="bi bi-plus-circle fs-6"></i></button>
                            </div>
                            <p class="mb-0">Add payment method</p>
                         </div>
                      </div>
                    </div>
                   </div>
               </div>
               <div class="collapse" id="collapseExample">
                <div class="card card-body mt-4 rounded-4 border p-4">
                  <h5 class="mb-0">Add new payment method</h5>
                  <hr class="my-4">
                  <form>
                    <div class="row g-3">
                      <div class="col-12">
                        <div>
                          <label for="cardNumber" class="form-label">Card Number</label>
                          <div class="position-relative">
                            <input type="text" class="form-control border-2 py-2" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX">
                            <span class="position-absolute top-50 end-0 translate-middle-y"><i class="bi bi-credit-card fs-6 me-3"></i></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div>
                          <label for="cardName" class="form-label">Full Name on Card</label>
                          <input type="text" class="form-control border-2 py-2" id="cardName" value="Zoe Bulle" placeholder="Zoe Bulle">
                        </div>
                      </div>
                      <div class="col-12 col-lg-8">
                        <div>
                          <label for="Expirationdate" class="form-label">Expiration date</label>
                          <input type="text" class="form-control border-2 py-2" id="Expirationdate" placeholder="MM/YY">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div>
                          <label for="CVC" class="form-label">CVC</label>
                          <input type="text" class="form-control border-2 py-2" id="CVC" placeholder="CVC">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                          <button type="button" class="btn btn-dark px-5 py-2">Add Card</button>
                          <button type="button" class="btn btn-outline-dark px-4 py-2">Cancle</button>
                        </div>
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