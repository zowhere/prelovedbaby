<?php
if (!function_exists('getCartCount')) {
    require_once __DIR__ . '/cart.php';
}

$cartSubtotal = getCartSubtotal();
$siteBase = $siteBase ?? '';
?>
<div class="offcanvas offcanvas-end offcanvas-cart p-2" tabindex="-1" id="offcanvasCart">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title">Shopping cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="cart-product-list d-flex flex-column">
      <?php include __DIR__ . '/cart-mini.php'; ?>
    </div>
  </div>
  <div class="cart-product-checout p-3 border-top">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <p class="mb-0">Subtotal</p>
      <h5 class="mb-0"><?php echo formatPrice($cartSubtotal); ?></h5>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a href="<?= htmlspecialchars($siteBase) ?>shopping-cart.php" class="btn btn-light border px-4 py-2 flex-fill">View Cart</a>
      <?php if (getCartCount() > 0): ?>
      <a href="<?= htmlspecialchars($siteBase) ?>checkout.php" class="btn btn-dark px-4 py-2 border border-dark flex-fill">Checkout</a>
      <?php else: ?>
      <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.php" class="btn btn-dark px-4 py-2 border border-dark flex-fill">Browse listings</a>
      <?php endif; ?>
    </div>
  </div>
</div>
