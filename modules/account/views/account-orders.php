<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
$sampleOrders = [
    [
        'id' => 'PLB-2025-1042',
        'date' => '14 Mar 2025',
        'status' => 'With courier',
        'status_class' => 'text-primary',
        'total' => 4580,
        'product_id' => 'chicco-pram',
    ],
    [
        'id' => 'PLB-2025-1087',
        'date' => '18 Mar 2025',
        'status' => 'Delivered',
        'status_class' => 'text-success',
        'total' => 2880,
        'product_id' => 'breast-pump',
    ],
    [
        'id' => 'PLB-2025-1123',
        'date' => '22 Mar 2025',
        'status' => 'Cancelled',
        'status_class' => 'text-danger',
        'total' => 3280,
        'product_id' => 'baby-cot',
    ],
    [
        'id' => 'PLB-2025-1156',
        'date' => '26 Mar 2025',
        'status' => 'Delivered',
        'status_class' => 'text-success',
        'total' => 3580,
        'product_id' => 'car-seat',
    ],
    [
        'id' => 'PLB-2025-1189',
        'date' => '28 Mar 2025',
        'status' => 'Cancelled',
        'status_class' => 'text-danger',
        'total' => 1880,
        'product_id' => 'high-chair',
    ],
    [
        'id' => 'PLB-2025-1214',
        'date' => '30 Mar 2025',
        'status' => 'Awaiting collection',
        'status_class' => 'text-primary',
        'total' => 12580,
        'product_id' => 'bugaboo-fox',
    ],
];
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
        <h2>My Orders</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">My Orders</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 my-account-section">
      <div class="container px-3">
	   <h2 class="d-none">My Orders</h2>
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
                      <a href="account-orders.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3 active"><span><i class="bi bi-bag-check"></i></span>My Orders</a>
<a href="account-payment-methods.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-wallet"></i></span>Payment Methods</a>
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
            <div class="my-orders border rounded-3 p-3">
               <div class="table-responsive">
                  <table class="table align-middle mb-0">
                     <thead class="table-light">
                      <tr>
                        <th>Order#</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Product</th>
                      </tr>
                     </thead>
                     <tbody>
                       <?php foreach ($sampleOrders as $order) :
                         $item = $products[$order['product_id']];
                       ?>
                       <tr>
                        <td><?= htmlspecialchars($order['id']) ?></td>
                        <td><?= htmlspecialchars($order['date']) ?></td>
                        <td><span class="d-flex align-items-center gap-2"><i class="bi bi-circle-fill <?= htmlspecialchars($order['status_class']) ?> font-12"></i><?= htmlspecialchars($order['status']) ?></span></td>
                        <td><?= formatPrice($order['total']) ?></td>
                        <td>
                          <div class="d-flex align-items-center gap-3">
                            <img src="<?= htmlspecialchars($item['image']) ?>" width="50" height="50" class="rounded-3 object-fit-cover" alt="<?= htmlspecialchars($item['name']) ?>">
                            <div>
                              <p class="mb-0 font-12 text-body-secondary"><?= htmlspecialchars($item['brand']) ?></p>
                              <p class="mb-0 fw-semibold"><?= htmlspecialchars($item['name']) ?></p>
                              <p class="mb-0 font-14 text-body-secondary"><?= htmlspecialchars($item['condition']) ?> · <?= htmlspecialchars($item['seller']) ?></p>
                            </div>
                          </div>
                        </td>
                       </tr>
                       <?php endforeach; ?>
                     </tbody>
                  </table>
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