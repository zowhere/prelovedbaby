<?php
require_once dirname(__DIR__, 2) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
require_once APP_ROOT . '/lib/auth.php';
requireLogin();
$accountMenuActive = 'addresses';
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
  
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  
  <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>plugins/swiper/css/swiper-bundle.min.css">
  
  <link href="<?= htmlspecialchars($siteBase) ?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>css/bootstrap-icons.min.css">
  
  <link href="<?= htmlspecialchars($siteBase) ?>css/sass/style.css" rel="stylesheet">
  
</head>

<body>

  
  <?php include APP_ROOT . '/views/header.php'; ?>

  <?php include APP_ROOT . '/views/navbar.php'; ?>

    

  
  <main class="main-content">

    
    <section class="section-breadcrumb bg-img-page-header d-flex align-items-center justify-content-center">
      <div class="container px-3 d-flex flex-column align-items-center justify-content-center">
        <h2>My Addresses</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
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
                  <?php include APP_ROOT . '/views/account-menu.php'; ?>
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
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/payment/stripe.png"
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
  

  
  <script src="<?= htmlspecialchars($siteBase) ?>js/jquery.min.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/bootstrap.bundle.min.js"></script>

<script src="plugins/swiper/js/swiper-bundle.min.js"></script>
<script src="<?= htmlspecialchars($siteBase) ?>js/search-slider.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/search-modal.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/main.js"></script>
</body>

</html>