<?php
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
$cartItems = getCartItems();
$subtotal = getCartSubtotal();
$courierFee = getCartCourierFee();
$total = getCartTotal();
$sellerCount = getUniqueSellerCount();
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
        <h2>Shopping Cart</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Shopping Cart</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5">
      <div class="container px-3">
        <div class="row g-4 g-lg-5">
          <div class="col-12 col-xl-8">
            <div class="cart-list d-flex flex-column gap-4">
              <?php include APP_ROOT . '/views/cart-list.php'; ?>
            </div>
          </div>
          <div class="col-12 col-xl-4">
              <div class="card border-0 rounded-4 bg-light">
                <div class="card-body">
                  <div class="checkout-card p-2">
                     <h4 class="mb-0">Order Summary</h4>
                     <div class="my-4 border-1 border-top"></div>
                     <div class="d-flex align-items-center justify-content-between mb-3">
                       <p class="mb-0">Subtotal</p>
                       <p class="mb-0"><?php echo formatPrice($subtotal); ?></p>
                     </div>
                     <?php if ($sellerCount > 0): ?>
                     <div class="d-flex align-items-center justify-content-between mb-3">
                      <p class="mb-0"><?php echo $courierPartnersShort; ?> (<?php echo $sellerCount; ?> seller<?php echo $sellerCount === 1 ? '' : 's'; ?>)</p>
                      <p class="mb-0">+<?php echo formatPrice($courierFee); ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="my-3 border-1 border-top"></div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <p class="mb-0 fs-5 fw-semibold">Total</p>
                      <p class="mb-0 fs-5 fw-semibold"><?php echo formatPrice($total); ?></p>
                    </div>
                    <div class="form-check my-3">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree with the terms and conditions
                      </label>
                    </div>
                    <div class="d-grid">
                      <?php if (getCartCount() > 0): ?>
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/checkout.php" class="btn btn-dark py-2 rounded-3">Proceed to checkout</a>
                      <?php else: ?>
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="btn btn-dark py-2 rounded-3">Browse listings</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card border-0 rounded-4 bg-light mt-4">
                <div class="card-body">
                  <div class="checkout-promocode p-2">
                     <p class="mb-2 fw-semibold">% Apply promo code</p>
                     <div class="d-flex align-items-center gap-2">
                      <input type="text" class="form-control border-2" placeholder="Enter promo code">
                      <button class="btn btn-dark px-3" type="button">Apply</button>
                    </div>
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