<?php
require_once dirname(__DIR__, 2) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
require_once APP_ROOT . '/lib/auth.php';
requireLogin();
$accountMenuActive = 'orders';

function getCustomerOrderStatus($status)
{
    return match ($status) {
        'completed' => ['label' => 'Delivered', 'class' => 'text-success'],
        'paid' => ['label' => 'Awaiting collection', 'class' => 'text-primary'],
        'pending', 'shipped' => ['label' => 'With courier', 'class' => 'text-primary'],
        'cancelled' => ['label' => 'Cancelled', 'class' => 'text-danger'],
        default => ['label' => ucfirst(str_replace('-', ' ', $status)), 'class' => 'text-body-secondary'],
    };
}

$ordersStmt = getPdo()->prepare(
    'SELECT o.id, o.total_amount, o.status, o.created_at,
            p.brand, p.name, p.image, p.item_condition, p.seller_name
     FROM orders o
     INNER JOIN order_items oi ON oi.order_id = o.id
     INNER JOIN products p ON p.id = oi.product_id
     WHERE o.user_id = ?
     ORDER BY o.created_at DESC, oi.id ASC'
);
$ordersStmt->execute([getCurrentUser()['id']]);
$userOrders = $ordersStmt->fetchAll();
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
        <h2>My Orders</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
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
                  <?php include APP_ROOT . '/views/account-menu.php'; ?>
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
                       <?php if (empty($userOrders)) : ?>
                       <tr>
                        <td colspan="5" class="text-body-secondary">No orders yet.</td>
                       </tr>
                       <?php else : ?>
                       <?php foreach ($userOrders as $order) :
                         $status = getCustomerOrderStatus($order['status']);
                         $orderNumber = 'PLB-' . date('Y', strtotime($order['created_at'])) . '-' . str_pad((string) $order['id'], 4, '0', STR_PAD_LEFT);
                       ?>
                       <tr>
                        <td><?= htmlspecialchars($orderNumber) ?></td>
                        <td><?= htmlspecialchars(date('d M Y', strtotime($order['created_at']))) ?></td>
                        <td><span class="d-flex align-items-center gap-2"><i class="bi bi-circle-fill <?= htmlspecialchars($status['class']) ?> font-12"></i><?= htmlspecialchars($status['label']) ?></span></td>
                        <td><?= formatPrice($order['total_amount']) ?></td>
                        <td>
                          <div class="d-flex align-items-center gap-3">
                            <img src="<?= htmlspecialchars($siteBase . ltrim($order['image'], '/')) ?>" width="50" height="50" class="rounded-3 object-fit-cover" alt="<?= htmlspecialchars($order['name']) ?>">
                            <div>
                              <p class="mb-0 font-12 text-body-secondary"><?= htmlspecialchars($order['brand']) ?></p>
                              <p class="mb-0 fw-semibold"><?= htmlspecialchars($order['name']) ?></p>
                              <p class="mb-0 font-14 text-body-secondary"><?= htmlspecialchars($order['item_condition']) ?> · <?= htmlspecialchars($order['seller_name']) ?></p>
                            </div>
                          </div>
                        </td>
                       </tr>
                       <?php endforeach; ?>
                       <?php endif; ?>
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