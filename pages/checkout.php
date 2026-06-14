<?php
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php
require_once APP_ROOT . '/lib/cart.php';
require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/locations.php';

$currentUser = getCurrentUser();
$checkoutCountries = getAllCountries();
$southAfricanProvinces = getSouthAfricanProvinces();
$checkoutCountry = $currentUser['country'] ?? 'South Africa';
if (!in_array($checkoutCountry, $checkoutCountries, true)) {
    $checkoutCountry = 'South Africa';
}
$checkoutFirstName = '';
$checkoutLastName = '';
$checkoutEmail = '';

if ($currentUser) {
    $nameParts = preg_split('/\s+/', trim($currentUser['name'] ?? ''), 2);
    $checkoutFirstName = $nameParts[0] ?? '';
    $checkoutLastName = $nameParts[1] ?? '';
    $checkoutEmail = $currentUser['email'] ?? '';
}

$checkoutRedirect = urlencode('pages/checkout.php');
$cartItems = getCartItems();
$cartSubtotal = getCartSubtotal();
$cartCourierFee = getCartCourierFee();
$cartTotal = getCartTotal();
$sellerCount = getUniqueSellerCount();
$checkoutError = $_GET['error'] ?? '';
require_once APP_ROOT . '/lib/payment.php';
$isFakeStripe = isFakeStripeEnabled();
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
        <h2>Checkout</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Checkout</li>
          </ol>
        </nav>
      </div>
    </section>
    
    
     <section class="checkout-section py-5">
        <div class="container px-3">
          <div class="row g-4 g-lg-5">
             <div class="col-12 col-lg-6">
                <div class="checkout-card">
                    <?php if ($checkoutError !== ''): ?>
                    <div class="alert alert-danger mb-4" role="alert"><?= htmlspecialchars($checkoutError) ?></div>
                    <?php endif; ?>
                    <?php if (getCartCount() === 0): ?>
                    <div class="alert alert-warning mb-4" role="alert">Your cart is empty. <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php">Browse listings</a> to continue.</div>
                    <?php endif; ?>
                    <?php if (!isLoggedIn()): ?>
                    <div class="login-form p-4 border rounded-3">
                      <h5 class="mb-4">Sign In or Sign Up</h5>
                      <div class="d-grid gap-3">
                         <a href="<?= htmlspecialchars($siteBase) ?>pages/auth/login.php?redirect=<?= $checkoutRedirect ?>" class="btn btn-dark py-2">Sign In</a>
                         <a href="<?= htmlspecialchars($siteBase) ?>pages/auth/register.php" class="btn btn-outline-dark py-2">Sign Up</a>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php if (getCartCount() > 0): ?>
                    <form method="post" action="<?= htmlspecialchars($siteBase) ?>checkout-actions.php">
                      <input type="hidden" name="action" value="place_order">
                    <?php endif; ?>
                    <div class="login-form p-4 border rounded-3">
                      <h5 class="mb-2">Signed in</h5>
                      <p class="mb-0 text-body-secondary">Signed in as <?= htmlspecialchars($currentUser['name']) ?>. Continue with your details below.</p>
                    </div>
                    <div class="mt-4 checkout-form p-4 border rounded-3">
                      <h5 class="mb-4">Fill in your information</h5>
                      <div class="row g-4">
                         <div class="col-12 col-lg-6">
                           <label for="FirstName" class="form-label">First Name</label>
                           <input type="text" class="form-control form-control-lg border-2" id="FirstName" name="first_name" placeholder="First Name" value="<?= htmlspecialchars($checkoutFirstName) ?>" required>
                         </div>
                         <div class="col-12 col-lg-6">
                           <label for="LastName" class="form-label">Last Name</label>
                           <input type="text" class="form-control form-control-lg border-2" id="LastName" name="last_name" placeholder="Last Name" value="<?= htmlspecialchars($checkoutLastName) ?>" required>
                         </div>
                         <div class="col-12 col-lg-6">
                          <label for="EmailId" class="form-label">Email</label>
                          <input type="email" class="form-control form-control-lg border-2" id="EmailId" name="email" placeholder="Email" value="<?= htmlspecialchars($checkoutEmail) ?>" required>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="PhoneNumber" class="form-label">Phone Number</label>
                          <input type="tel" class="form-control form-control-lg border-2" id="PhoneNumber" name="phone" placeholder="+27 82 123 4567" required>
                        </div>
                        <div class="col-12 col-lg-12" data-checkout-country>
                          <?php
                          $selectId = 'SelectCountry';
                          $selectName = 'country';
                          $selectLabel = 'Country';
                          $selectOptions = $checkoutCountries;
                          $selectValue = $checkoutCountry;
                          $selectPlaceholder = 'Type to search countries (e.g. Sou for South Africa)';
                          $selectInputClass = 'form-control-lg';
                          include APP_ROOT . '/views/searchable-select.php';
                          ?>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="TownCity" class="form-label">Town / City</label>
                          <input type="text" class="form-control form-control-lg border-2" id="TownCity" name="city" placeholder="Johannesburg" required>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="Street" class="form-label">Street address</label>
                          <input type="text" class="form-control form-control-lg border-2" id="Street" name="street" placeholder="42 Rivonia Road, Morningside" required>
                        </div>
                        <div class="col-12 col-lg-6<?= isSouthAfrica($checkoutCountry) ? '' : ' d-none' ?>" data-checkout-province-select>
                          <label for="ChooseProvince" class="form-label">Province</label>
                          <select class="form-select form-select-lg border-2" id="ChooseProvince" name="province">
                            <?php foreach ($southAfricanProvinces as $province): ?>
                            <option value="<?= htmlspecialchars($province) ?>"><?= htmlspecialchars($province) ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-12 col-lg-6<?= isSouthAfrica($checkoutCountry) ? ' d-none' : '' ?>" data-checkout-province-text>
                          <label for="ProvinceRegion" class="form-label">Province / State / Region</label>
                          <input type="text" class="form-control form-control-lg border-2" id="ProvinceRegion" name="province_region" placeholder="Province, state, or region">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="PostalCode" class="form-label">Postal code</label>
                          <input type="text" class="form-control form-control-lg border-2" id="PostalCode" name="postal_code" placeholder="2196" required>
                        </div>
                        <div class="col-12 col-lg-12">
                          <label for="WriteNote" class="form-label">Write Note</label>
                          <textarea class="form-control border-2" id="WriteNote" name="note" rows="4" cols="4" placeholder="Write Something..."></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 card-payment-method rounded-3 px-4 py-3 border">
                      <div class="">
                        <div class="form-check" data-bs-toggle="collapse" data-bs-target="#collapseCardDetails">
                          <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="credit-card" checked>
                          <label class="form-check-label" for="flexRadioDefault1">
                            Credit Card
                          </label>
                        </div>
                        <div class="collapse show" id="collapseCardDetails">
                          <div class="mt-3">
                            <p class="mb-0">Pay securely by card<?= $isFakeStripe ? ' (demo mode — no real charge)' : '' ?>. Your order will be processed once payment is confirmed.</p>
                              <div class="card-details mt-3">
                                <div class="row g-4">
                                  <div class="col-12 col-lg-12">
                                    <label for="Nameoncard" class="form-label">Name on card</label>
                                    <input type="text" class="form-control form-control-lg border-2" id="Nameoncard" name="name_on_card" placeholder="Name on card" required>
                                  </div>
                                  <div class="col-12 col-lg-12">
                                    <label for="CardNumbers" class="form-label">Card number</label>
                                    <input type="text" class="form-control form-control-lg border-2" id="CardNumbers" name="card_number" placeholder="4242 4242 4242 4242" inputmode="numeric" autocomplete="cc-number" required>
                                  </div>
                                  <div class="col-12 col-lg-6">
                                    <label for="Date" class="form-label">Expiry date</label>
                                    <input type="date" class="form-control form-control-lg border-2" id="Date" name="expiry" required>
                                  </div>
                                  <div class="col-12 col-lg-6">
                                    <label for="CVV" class="form-label">CVV</label>
                                    <input type="text" class="form-control form-control-lg border-2" id="CVV" name="cvv" placeholder="CVV" inputmode="numeric" autocomplete="cc-csc" required>
                                  </div>
                                  <div class="col-12 col-lg-12">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" id="SaveCardDetails" name="save_card">
                                      <label class="form-check-label" for="SaveCardDetails">
                                        Save card details
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php if (getCartCount() > 0): ?>
                    <div class="d-grid mt-4">
                      <button type="submit" class="btn btn-dark py-2 rounded-3">Pay <?= formatPrice($cartTotal) ?></button>
                    </div>
                    </form>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
             </div>
             <div class="col-12 col-lg-6">
                <div class="order-summary">
                  <div class="cart-list d-flex flex-column gap-4">
                    <?php include APP_ROOT . '/views/cart-list.php'; ?>
                  </div>
                  <div class="card border-0 rounded-4 bg-light mt-4">
                    <div class="card-body">
                      <div class="checkout-promocode p-2">
                         <p class="mb-2 fw-semibold">% Apply promo code</p>
                         <div class="d-flex align-items-center gap-2">
                          <input type="text" class="form-control border-2" placeholder="Enter promo code" aria-label="Recipient's username" aria-describedby="button-addon2">
                          <button class="btn btn-dark px-3" type="button">Apply</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 rounded-4 bg-light mt-4">
                    <div class="card-body">
                      <div class="checkout-card p-2">
                         <h4 class="mb-0">Order Summary</h4>
                         <div class="my-4 border-1 border-top"></div>
                         <div class="d-flex align-items-center justify-content-between mb-3">
                           <p class="mb-0">Subtotal</p>
                           <p class="mb-0"><?= formatPrice($cartSubtotal) ?></p>
                         </div>
                        <?php if ($sellerCount > 0): ?>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <p class="mb-0"><?= $courierPartnersShort ?> (<?= $sellerCount ?> seller<?= $sellerCount === 1 ? '' : 's' ?>)</p>
                          <p class="mb-0">+<?= formatPrice($cartCourierFee) ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="my-3 border-1 border-top"></div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <p class="mb-0 fs-5 fw-semibold">Total</p>
                          <p class="mb-0 fs-5 fw-semibold"><?= formatPrice($cartTotal) ?></p>
                        </div>
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

  <script src="<?= htmlspecialchars($siteBase) ?>js/searchable-select.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/main.js"></script>
</body>

</html>