<?php
require_once dirname(__DIR__) . '/bootstrap.php';
require_once APP_ROOT . '/lib/products.php';
require_once APP_ROOT . '/lib/orders.php';

$checkoutSuccess = $_SESSION['checkout_success'] ?? null;
if (!$checkoutSuccess) {
    header('Location: ' . $siteBase . 'pages/shop.php');
    exit;
}

$orderNumber = $checkoutSuccess['order_number'] ?? formatOrderNumber($checkoutSuccess['order_id'] ?? 0);
$customerEmail = $checkoutSuccess['email'] ?? '';
$receiptSent = !empty($checkoutSuccess['receipt_sent']);

unset($_SESSION['checkout_success']);

$thankYouRecommendations = array_slice(array_values($products), 0, 3);
?>
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
        <h2>Thank You</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Thank You</li>
          </ol>
        </nav>
      </div>
    </section>
    
    
    <section class="py-5 thank-you-section">
      <div class="container px-3">
          <div class="thank-you-content">
            <div class="text-center">
                 <div class="fs-1 mb-3">
                  <i class="bi bi-check-circle-fill text-success"></i>
                 </div>
                 <p class="mb-2">Order id #<?= htmlspecialchars($orderNumber) ?></p>
                 <h5 class="mb-0 fw-semibold">Thank you for your order!</h5>
                 <?php if ($receiptSent && $customerEmail !== ''): ?>
                 <p class="mb-0 mt-3 text-body-secondary">A receipt has been emailed to <?= htmlspecialchars($customerEmail) ?>.</p>
                 <?php elseif ($customerEmail !== ''): ?>
                 <p class="mb-0 mt-3 text-body-secondary">Your order is confirmed. We could not send a receipt email — please check your inbox later or contact support.</p>
                 <?php endif; ?>
                 <div class="mt-4">
                   <a href="<?= htmlspecialchars($siteBase) ?>index.php" class="btn btn-dark py-2 px-4 rounded-3">Continue Shopping</a>
                 </div>
            </div>
          </div>
      </div>
    </section>

        
        <section class="py-4 thank-you-recommendations">
          <div class="container px-3">
            <h5 class="thank-you-recommendations-title mb-3 fw-semibold">You may also like</h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
              <?php foreach ($thankYouRecommendations as $item): ?>
              <div class="col">
                <div class="product-card product-card--listing border rounded-3">
                  <div class="d-flex flex-column">
                    <div class="position-relative product-img-wrap">
                      <a href="<?= htmlspecialchars($siteBase . $item['url']) ?>">
                        <img src="<?= htmlspecialchars($siteBase . $item['image']) ?>" class="product-img img-fluid rounded-3" alt="<?= htmlspecialchars($item['name']) ?>" loading="lazy">
                      </a>
                    </div>
                    <div>
                      <p class="listing-brand mb-1"><?= htmlspecialchars($item['brand']) ?></p>
                      <h3 class="product-name mb-1">
                        <a href="<?= htmlspecialchars($siteBase . $item['url']) ?>" class="text-body text-decoration-none"><?= htmlspecialchars($item['name']) ?></a>
                      </h3>
                      <p class="mb-1 product-price"><?= formatPrice($item['price']) ?></p>
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                        <img src="<?= htmlspecialchars($siteBase . $item['seller_avatar']) ?>" class="seller-avatar" alt="<?= htmlspecialchars($item['seller']) ?>" width="28" height="28" loading="lazy">
                        <span class="flex-grow-1">
                          <span class="d-block font-14 fw-semibold text-body"><?= htmlspecialchars($item['seller']) ?></span>
                          <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> <?= htmlspecialchars((string) $item['seller_rating']) ?> · <?= (int) $item['seller_reviews'] ?> reviews</span>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
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