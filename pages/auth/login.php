<?php
require_once dirname(__DIR__, 2) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php
require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/rbac.php';
$error = $_GET['error'] ?? '';
$redirect = $_GET['redirect'] ?? 'pages/account/profile.php';
if (!str_starts_with($redirect, 'pages/') || str_contains($redirect, '..') || str_contains($redirect, '//')) {
    $redirect = 'pages/account/profile.php';
}
if (isLoggedIn()) {
    header('Location: ' . $siteBase . (can('dashboard.view') ? 'admin/index.php' : $redirect));
    exit;
}
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
        <h2>Login</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Login</li>
          </ol>
        </nav>
      </div>
    </section>
    
    
    <section class="py-5">
        <div class="container px-3">
           <div class="row g-4 g-lg-5 align-items-center">
             <div class="col-12 col-xl-6">
               <div class="auth-register p-4 p-sm-5 rounded-3 border">
                  <h4 class="mb-0">Login</h4>
                  <p>Don't have an account yet? <a href="<?= htmlspecialchars($siteBase) ?>pages/auth/register.php" class="text-decoration-underline link-body-emphasis">Sign Up</a></p>
                  <p class="mb-0">Selling baby gear? <a href="<?= htmlspecialchars($siteBase) ?>pages/auth/register-seller.php" class="text-decoration-underline link-body-emphasis">Register as a seller</a></p>
                  <?php if ($error): ?>
                  <div class="alert alert-danger mt-4 mb-0"><?= htmlspecialchars($error) ?></div>
                  <?php endif; ?>
                  <form class="form-body mt-5" method="post" action="<?= htmlspecialchars($siteBase) ?>auth-actions.php">
                    <input type="hidden" name="action" value="login">
                    <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">
                    <div class="row row-cols-1 g-3">
                       <div class="col">
                          <label for="EmailAddress" class="form-label">Email address</label>
                          <input type="email" class="form-control form-control-lg border-2" id="EmailAddress" name="email" required autocomplete="email">
                       </div>
                       <div class="col">
                        <label for="inputChoosePassword" class="form-label">Password</label>
                        <div class="input-group" id="show_hide_password">
													<input type="password" class="form-control form-control-lg border-end-0" id="inputChoosePassword" name="password" placeholder="Enter password" required autocomplete="current-password">
                          <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
												</div>
                      </div>  
                      <div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
                      <div class="col-md-6 text-end"><a href="<?= htmlspecialchars($siteBase) ?>pages/auth/forgot-password.php" class="text-decoration-underline link-body-emphasis">Forgot Password ?</a>
											</div>
                      <div class="col">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-dark btn-lg px-4 rounded-3"><span class="fs-6">Login</span></button>
                        </div>
                      </div>
                    </div>
                  </form>
               </div>
             </div> 
             <div class="col-12 col-xl-6 d-none d-xl-flex">
               <div class="auth-register-img">
                  <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/auth/login.png" class="img-fluid" width="650" alt="">
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
  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>
</body>

</html>