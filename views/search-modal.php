<?php
if (!function_exists('formatPrice')) {
    require_once APP_ROOT . '/lib/cart.php';
}

$searchKeywords = [
    'prams',
    'bassinets',
    'car seats',
    'breast pumps',
    'high chairs',
    'nursery furniture',
    'bugaboo',
    'baby cot',
];
$recentProductIds = ['chicco-pram', 'breast-pump', 'car-seat'];
?>

<div class="modal fade search-modal" id="searchModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content p-lg-2 p-0">
      <div class="p-4">
        <div class="d-flex align-items-center justify-content-between">
          <h1 class="modal-title fs-5 mb-0">Search</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="position-relative mt-3 site-search-form" action="pages/shop.php" method="get">
          <input type="text" name="q" class="form-control form-control-lg form-control-search pe-5 border-2"
            placeholder="Search prams, bassinets, breast pumps &amp; more" autocomplete="off">
          <button type="submit" class="btn btn-link position-absolute top-50 end-0 translate-middle-y border-0 text-body p-0" aria-label="Search">
            <i class="bi bi-search fs-6 me-3"></i>
          </button>
        </form>
        <div class="search-keywords mt-4">
          <h5 class="mb-3">Top searches keywords</h5>
          <div class="d-flex align-items-center flex-nowrap gap-2 overflow-x-auto">
            <?php foreach ($searchKeywords as $keyword) : ?>
            <button type="button" class="btn border border-2 px-4 rounded-5 flex-shrink-0 site-search-keyword" data-q="<?= htmlspecialchars($keyword) ?>"><?= htmlspecialchars($keyword) ?></button>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="modal-body p-4">
        <div class="recently-viewed">
          <h5 class="mb-3">Recently viewed listings</h5>
          <div class="d-flex flex-column gap-3">
            <?php foreach ($recentProductIds as $productId) :
              $recent = $products[$productId] ?? null;
              if ($recent === null) {
                  continue;
              }
            ?>
            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3 border p-3 rounded-3">
              <a href="<?= htmlspecialchars($recent['url']) ?>">
                <img src="<?= htmlspecialchars($recent['image']) ?>" class="rounded-3" width="100" alt="<?= htmlspecialchars($recent['name']) ?>">
              </a>
              <div class="flex-grow-1">
                <h4 class="mb-1"><?= formatPrice($recent['price']) ?></h4>
                <p class="mb-0"><?= htmlspecialchars($recent['name']) ?></p>
                <p class="mb-0 font-14 text-body-secondary"><?= htmlspecialchars($recent['condition']) ?> · <?= htmlspecialchars($recent['seller']) ?></p>
              </div>
              <div class="d-grid gap-2">
                <a href="<?= htmlspecialchars($recent['url']) ?>" class="btn btn-dark border border-dark px-4">View Listing</a>
                <a href="pages/shop.php" class="btn btn-light border px-4">Browse Listings</a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

