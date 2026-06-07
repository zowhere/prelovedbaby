<!doctype html>
<html lang="en">
<?php require_once __DIR__ . '/includes/cart.php'; ?>
<?php
$savedAddresses = [
    [
        'label' => 'Home',
        'primary' => true,
        'name' => 'Zoe Bulle',
        'phone' => '+27 82 456 7890',
        'line1' => '42 Rivonia Road, Morningside',
        'suburb' => 'Sandton',
        'city' => 'Johannesburg',
        'postal' => '2196',
        'province' => 'Gauteng',
        'country' => 'South Africa',
    ],
    [
        'label' => 'Courier collection',
        'primary' => false,
        'name' => 'Zoe Bulle',
        'phone' => '+27 82 456 7890',
        'line1' => '15 Kloof Street, Gardens',
        'suburb' => 'Cape Town CBD',
        'city' => 'Cape Town',
        'postal' => '8001',
        'province' => 'Western Cape',
        'country' => 'South Africa',
    ],
];
$primaryAddress = $savedAddresses[0];
?>

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
        <h2>My Addresses</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">My Addresses</li>
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
                      <a href="account-orders.html" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-bag-check"></i></span>My Orders</a>
<a href="account-payment-methods.html" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-wallet"></i></span>Payment Methods</a>
                      <a href="javascript:;" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-star"></i></span>My Reviews</a>
                      <a href="account-my-profile.html" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-person-square"></i></span>My Profile</a>
                      <a href="account-addresses.html" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3 active"><span><i class="bi bi-geo-alt"></i></span>Addresses</a>
                      <a href="auth-login.html" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-box-arrow-left"></i></span>Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-12 col-lg-9">
            <div class="my-profile">
               <h4 class="mb-4">My Addresses</h4>
               <p class="text-body-secondary mb-4">Saved addresses for <?= $courierPartnersShort ?> drop-offs and local collection across South Africa.</p>
               <?php foreach ($savedAddresses as $address) : ?>
               <div class="card rounded-3 border<?= $address !== $savedAddresses[0] ? ' mt-4' : '' ?>">
                <div class="card-body p-4">
                   <div class="d-flex align-items-center gap-3">
                      <h5 class="mb-0"><?= htmlspecialchars($address['label']) ?></h5>
                      <?php if ($address['primary']) : ?>
                      <span class="badge rounded-5 bg-dark">Primary</span>
                      <?php endif; ?>
                   </div>
                   <div class="mt-3">
                      <p class="mb-1 fw-semibold"><?= htmlspecialchars($address['name']) ?> · <?= htmlspecialchars($address['phone']) ?></p>
                      <address class="mb-0"><?= htmlspecialchars($address['line1']) ?><br>
                        <?= htmlspecialchars($address['suburb']) ?>, <?= htmlspecialchars($address['city']) ?><br>
                        <?= htmlspecialchars($address['province']) ?>, <?= htmlspecialchars($address['postal']) ?><br>
                        <?= htmlspecialchars($address['country']) ?></address>
                   </div>
                   <div class="mt-3 d-flex align-items-center gap-3">
                      <button type="button" class="btn btn-sm btn-outline-dark px-4 rounded-3" data-bs-toggle="modal" data-bs-target="#EditAddressModal">Edit</button>
                      <button type="button" class="btn btn-sm btn-outline-danger px-4 rounded-3">Delete</button>
                   </div>
                </div>
               </div>
               <?php endforeach; ?>
               <div class="mt-4">
                <button type="button" class="btn btn-sm btn-outline-dark border-2 border rounded-3 px-4" data-bs-toggle="modal" data-bs-target="#AddNewAddressModal"><i class="bi bi-plus-lg me-2"></i>Add new address</button>
               </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    
    <div class="modal fade" id="EditAddressModal" tabindex="-1" aria-labelledby="EditAddressModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header px-4">
            <h1 class="modal-title fs-5" id="EditAddressModalLabel">Edit Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <div class="">
              <h6 class="fw-semibold mb-3">Contact Details</h6>
              <div class="form-floating mb-3">
               <input type="text" class="form-control" id="floatingName2" value="<?= htmlspecialchars($primaryAddress['name']) ?>">
               <label for="floatingName2">Full name</label>
             </div>
             <div class="form-floating mb-3">
               <input type="text" class="form-control" id="floatingMobileNo2" value="<?= htmlspecialchars($primaryAddress['phone']) ?>">
               <label for="floatingMobileNo2">Mobile number</label>
             </div>
            </div>
   
            <div class="mt-4">
             <h6 class="fw-semibold mb-3">Address</h6>
             <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPinCode2" value="<?= htmlspecialchars($primaryAddress['postal']) ?>">
              <label for="floatingPinCode2">Postal code</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAddress2" value="<?= htmlspecialchars($primaryAddress['line1']) ?>">
              <label for="floatingAddress2">Street address</label>
            </div>
            <div class="form-floating mb-3">
             <input type="text" class="form-control" id="floatingLocalityTown2" value="<?= htmlspecialchars($primaryAddress['suburb']) ?>">
             <label for="floatingLocalityTown2">Suburb</label>
           </div>
           <div class="row g-3">
             <div class="col">
               <div class="form-floating">
                 <input type="text" class="form-control" id="floatingCity2" value="<?= htmlspecialchars($primaryAddress['city']) ?>">
                 <label for="floatingCity2">City</label>
               </div>
             </div>
             <div class="col">
               <div class="form-floating">
                 <input type="text" class="form-control" id="floatingState2" value="<?= htmlspecialchars($primaryAddress['province']) ?>">
                 <label for="floatingState2">Province</label>
               </div>
             </div>
            </div>
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="floatingCountry2" value="<?= htmlspecialchars($primaryAddress['country']) ?>">
              <label for="floatingCountry2">Country</label>
            </div>
           </div>
   
         </div>
          <div class="modal-footer px-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-dark">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    

    
    <div class="modal fade" id="AddNewAddressModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header px-4">
            <h1 class="modal-title fs-5">Add New Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <div class="">
              <h6 class="fw-bold mb-3">Contact Details</h6>
              <div class="form-floating mb-3">
               <input type="text" class="form-control" id="floatingName" placeholder="Zoe Bulle">
               <label for="floatingName">Full name</label>
             </div>
             <div class="form-floating mb-3">
               <input type="text" class="form-control" id="floatingMobileNo" placeholder="+27 82 000 0000">
               <label for="floatingMobileNo">Mobile number</label>
             </div>
            </div>
   
            <div class="mt-4">
             <h6 class="fw-bold mb-3">Address</h6>
             <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPinCode" placeholder="2196">
              <label for="floatingPinCode">Postal code</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAddress" placeholder="42 Rivonia Road, Morningside">
              <label for="floatingAddress">Street address</label>
            </div>
            <div class="form-floating mb-3">
             <input type="text" class="form-control" id="floatingLocalityTown" placeholder="Sandton">
             <label for="floatingLocalityTown">Suburb</label>
           </div>
           <div class="row g-3">
             <div class="col">
               <div class="form-floating">
                 <input type="text" class="form-control" id="floatingCity" placeholder="Johannesburg">
                 <label for="floatingCity">City</label>
               </div>
             </div>
             <div class="col">
               <div class="form-floating">
                 <input type="text" class="form-control" id="floatingState" placeholder="Gauteng">
                 <label for="floatingState">Province</label>
               </div>
             </div>
            </div>
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="floatingCountry" value="South Africa">
              <label for="floatingCountry">Country</label>
            </div>
           </div>
   
         </div>
          <div class="modal-footer px-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-dark">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    

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