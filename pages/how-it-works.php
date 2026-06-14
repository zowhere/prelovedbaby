<?php
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>How It Works · PreLoved Baby</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
        <h2>How It Works</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">How It Works</li>
          </ol>
        </nav>
      </div>
    </section>

    <section class="py-5">
      <div class="container px-3">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8">
            <p class="text-para mb-4">PreLoved Baby connects parents who want quality baby gear at better prices. Here is how buying works:</p>
            <ol class="text-para mb-4 ps-3">
              <li class="mb-2"><strong>Browse listings</strong> — search by category, brand or price.</li>
              <li class="mb-2"><strong>View item details</strong> — check photos, condition and seller ratings.</li>
              <li class="mb-2"><strong>Add to cart</strong> — reserve the gear you want.</li>
              <li class="mb-2"><strong>Checkout securely</strong> — pay online with card or EFT.</li>
              <li class="mb-2"><strong>Collect or courier</strong> — arrange handover with the seller.</li>
            </ol>
            <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="btn btn-dark px-4 me-2">Browse Listings</a>
            <a href="<?= htmlspecialchars($siteBase) ?>index.php" class="btn btn-outline-dark px-4">Back to Home</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer-strip py-4 border-top">
    <div class="container px-3">
      <p class="mb-0 font-12">@All rights reserved. PreLoved Baby</p>
    </div>
  </footer>

  <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
  <?php include APP_ROOT . '/views/cart-offcanvas.php'; ?>
  <?php include APP_ROOT . '/views/search-modal.php'; ?>
  <script src="<?= htmlspecialchars($siteBase) ?>js/jquery.min.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/bootstrap.bundle.min.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/main.js"></script>
</body>
</html>
