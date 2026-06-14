<?php
require_once dirname(__DIR__, 2) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php
require_once APP_ROOT . '/lib/cart.php';
require_once APP_ROOT . '/lib/seller-listings.php';
requireSeller();

$user = getCurrentUser();
$listings = getSellerListings($user['id']);
$error = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
$accountMenuActive = 'listings';
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Listings · PreLoved Baby</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
        <h2>My Listings</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">My Listings</li>
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
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
              <div>
                <h5 class="mb-1">Your listings</h5>
                <p class="mb-0 text-body-secondary font-14">New listings are reviewed by our team before going live.</p>
              </div>
              <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listing-form.php" class="btn btn-dark">Add listing</a>
            </div>

            <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <div class="card border-0 rounded-3 bg-light">
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table mb-0 align-middle">
                    <thead>
                      <tr>
                        <th>Listing</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (empty($listings)): ?>
                      <tr>
                        <td colspan="4" class="p-4 text-body-secondary">You have not listed anything yet. <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listing-form.php">Add your first listing</a>.</td>
                      </tr>
                      <?php else: ?>
                      <?php foreach ($listings as $listing): ?>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-3">
                            <?php if (!empty($listing['image'])): ?>
                            <img src="<?= htmlspecialchars($siteBase . ltrim($listing['image'], '/')) ?>" alt="" width="56" height="56" class="rounded-3 object-fit-cover">
                            <?php endif; ?>
                            <div>
                              <div class="fw-semibold"><?= htmlspecialchars($listing['name']) ?></div>
                              <div class="font-14 text-body-secondary"><?= htmlspecialchars($listing['brand']) ?> · <?= htmlspecialchars($listing['listing_id']) ?></div>
                            </div>
                          </div>
                        </td>
                        <td><?= formatPrice((float) $listing['price']) ?></td>
                        <td><?= sellerListingStatusBadge($listing['status']) ?></td>
                        <td class="text-end">
                          <?php if ($listing['status'] === 'live'): ?>
                          <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php?id=<?= urlencode($listing['slug']) ?>" class="btn btn-sm btn-outline-dark">View</a>
                          <?php elseif (sellerCanEditListing($listing)): ?>
                          <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listing-form.php?id=<?= (int) $listing['id'] ?>" class="btn btn-sm btn-outline-dark">Edit</a>
                          <?php else: ?>
                          <span class="font-14 text-body-secondary">—</span>
                          <?php endif; ?>
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
          <a href="javascript:;"><img src="<?= htmlspecialchars($siteBase) ?>images/gallery/payment/stripe.png" class="img-fluid" width="40" alt="Stripe"></a>
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
