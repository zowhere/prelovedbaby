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
$productId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isEdit = $productId > 0;
$listing = [
    'name' => '',
    'brand' => '',
    'price' => '',
    'item_condition' => 'Like New',
    'location' => '',
    'description' => '',
    'image' => '',
];
$selectedCategoryIds = [];

if ($isEdit) {
    $found = getSellerListingById($productId, $user['id']);
    if (!$found || !sellerCanEditListing($found)) {
        header('Location: ' . $siteBase . 'pages/account/listings.php?error=' . urlencode('This listing cannot be edited.'));
        exit;
    }
    $listing = $found;

    $catStmt = getPdo()->prepare('SELECT category_id FROM product_categories WHERE product_id = ?');
    $catStmt->execute([$productId]);
    $selectedCategoryIds = array_column($catStmt->fetchAll(), 'category_id');
}

$categories = getPdo()->query('SELECT id, name FROM categories ORDER BY name')->fetchAll();
$conditions = ['Like New', 'Good', 'Fair'];
$error = $_GET['error'] ?? '';
$accountMenuActive = 'listings';
$pageTitle = $isEdit ? 'Edit Listing' : 'Add Listing';
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?> · PreLoved Baby</title>
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
        <h2><?= htmlspecialchars($pageTitle) ?></h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>pages/account/listings.php" class="breadcrumb-link">My Listings</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active"><?= htmlspecialchars($pageTitle) ?></li>
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
            <?php if ($error): ?>
            <div class="alert alert-danger mb-4"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <div class="card border-0 rounded-3 bg-light">
              <div class="card-body p-4">
                <p class="text-body-secondary font-14 mb-4">Listings are submitted for review before appearing in the shop. Seller: <strong><?= htmlspecialchars($user['name']) ?></strong></p>
                <form action="<?= htmlspecialchars($siteBase) ?>seller-listing-actions.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="<?= $isEdit ? 'update' : 'create' ?>">
                  <?php if ($isEdit): ?>
                  <input type="hidden" name="id" value="<?= $productId ?>">
                  <?php endif; ?>

                  <div class="row g-3">
                    <div class="col-md-8">
                      <label for="name" class="form-label">Product name</label>
                      <input type="text" class="form-control border-2 py-2" id="name" name="name" value="<?= htmlspecialchars($listing['name']) ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="brand" class="form-label">Brand</label>
                      <input type="text" class="form-control border-2 py-2" id="brand" name="brand" value="<?= htmlspecialchars($listing['brand']) ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="price" class="form-label">Price (ZAR)</label>
                      <input type="number" step="0.01" min="0" class="form-control border-2 py-2" id="price" name="price" value="<?= htmlspecialchars($listing['price']) ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="item_condition" class="form-label">Condition</label>
                      <select class="form-select border-2 py-2" id="item_condition" name="item_condition">
                        <?php foreach ($conditions as $condition): ?>
                        <option value="<?= htmlspecialchars($condition) ?>"<?= ($listing['item_condition'] ?? '') === $condition ? ' selected' : '' ?>><?= htmlspecialchars($condition) ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="location" class="form-label">Location</label>
                      <input type="text" class="form-control border-2 py-2" id="location" name="location" value="<?= htmlspecialchars($listing['location'] ?? '') ?>" placeholder="Sandton, Johannesburg">
                    </div>
                    <div class="col-12">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control border-2 py-2" id="description" name="description" rows="4"><?= htmlspecialchars($listing['description'] ?? '') ?></textarea>
                    </div>
                    <div class="col-md-6">
                      <label for="image_file" class="form-label">Upload image</label>
                      <input type="file" class="form-control border-2 py-2" id="image_file" name="image_file" accept="image/jpeg,image/png,image/webp">
                    </div>
                    <div class="col-md-6">
                      <label for="image" class="form-label">Or image path</label>
                      <input type="text" class="form-control border-2 py-2" id="image" name="image" value="<?= htmlspecialchars($listing['image'] ?? '') ?>" placeholder="images/gallery/products/recommended/chicco-pram.png">
                    </div>
                    <?php if (!empty($listing['image'])): ?>
                    <div class="col-12">
                      <img src="<?= htmlspecialchars($siteBase . ltrim($listing['image'], '/')) ?>" alt="Current image" class="rounded-3" width="120">
                    </div>
                    <?php endif; ?>
                    <div class="col-12">
                      <label class="form-label">Categories</label>
                      <div class="d-flex flex-wrap gap-2">
                        <?php foreach ($categories as $category): ?>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="category_ids[]" value="<?= (int) $category['id'] ?>" id="cat-<?= (int) $category['id'] ?>"<?= in_array((string) $category['id'], array_map('strval', $selectedCategoryIds), true) ? ' checked' : '' ?>>
                          <label class="form-check-label" for="cat-<?= (int) $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></label>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-dark px-4 py-2"><?= $isEdit ? 'Save listing' : 'Submit listing' ?></button>
                    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listings.php" class="btn btn-outline-dark px-4 py-2">Cancel</a>
                  </div>
                </form>
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
