<?php
require_once dirname(__DIR__, 2) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php
require_once APP_ROOT . '/lib/cart.php';
require_once APP_ROOT . '/lib/auth.php';
requireLogin();

$user = findUserById(getCurrentUser()['id']);
$nameParts = preg_split('/\s+/', trim($user['name'] ?? ''), 2);
$firstName = $nameParts[0] ?? '';
$lastName = $nameParts[1] ?? '';
$userCountry = $user['country'] ?? 'South Africa';
$profileCountries = getProfileCountries();
$error = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
$registeredSeller = ($_GET['registered'] ?? '') === 'seller';
$accountMenuActive = 'profile';
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
 <?php include APP_ROOT . '/views/analytics-head.php'; ?>
</head>

<body>

  
  <?php include APP_ROOT . '/views/header.php'; ?>

  <?php include APP_ROOT . '/views/navbar.php'; ?>

    

  
  <main class="main-content">

    
    <section class="section-breadcrumb bg-img-page-header d-flex align-items-center justify-content-center">
      <div class="container px-3 d-flex flex-column align-items-center justify-content-center">
        <h2>My Profile</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
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
                  <?php include APP_ROOT . '/views/account-menu.php'; ?>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-12 col-lg-9">
            <div class="my-profile">
               <?php if ($registeredSeller): ?>
               <div class="alert alert-success mb-4">Your seller account is ready. <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listings.php">Go to My Listings</a> to add your first item.</div>
               <?php endif; ?>
               <?php if ($error): ?>
               <div class="alert alert-danger mb-4"><?= htmlspecialchars($error) ?></div>
               <?php endif; ?>
               <?php if ($success): ?>
               <div class="alert alert-success mb-4"><?= htmlspecialchars($success) ?></div>
               <?php endif; ?>
               <div class="card border-0 rounded-3 bg-light">
                 <div class="card-body p-4">
                    <h5 class="mb-4">My Information</h5>
                    <form method="post" action="<?= htmlspecialchars($siteBase) ?>auth-actions.php">
                      <input type="hidden" name="action" value="update_profile">
                      <div class="row g-3">
                        <div class="col-12 col-lg-6">
                          <label for="FirstName" class="form-label">First Name</label>
                          <input type="text" class="form-control border-2 py-2" id="FirstName" name="first_name" value="<?= htmlspecialchars($firstName) ?>" required autocomplete="given-name">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="LastName" class="form-label">Last Name</label>
                          <input type="text" class="form-control border-2 py-2" id="LastName" name="last_name" value="<?= htmlspecialchars($lastName) ?>" autocomplete="family-name">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="emailid" class="form-label">Email ID</label>
                          <input type="text" class="form-control border-2 py-2" id="emailid" value="<?= htmlspecialchars($user['email'] ?? '') ?>" readonly>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="AccountType" class="form-label">Account Type</label>
                          <input type="text" class="form-control border-2 py-2" id="AccountType" value="<?= htmlspecialchars($user['role_name'] ?? '') ?>" readonly>
                        </div>
                        <div class="col-12 col-lg-12">
                          <label for="SelectCountry" class="form-label">Country</label>
                          <select class="form-select border-2 py-2" id="SelectCountry" name="country" required>
                            <?php foreach ($profileCountries as $country): ?>
                            <option value="<?= htmlspecialchars($country) ?>"<?= $country === $userCountry ? ' selected' : '' ?>><?= htmlspecialchars($country) ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-lg-12">
                          <button type="submit" class="btn btn-dark px-4 py-2">Save Changes</button>
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