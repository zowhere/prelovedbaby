<?php
$siteBase = $siteBase ?? '/';
$cartItems = getCartItems();
?>

<?php if (empty($cartItems)) : ?>
  <div class="text-center py-5">
    <p class="mb-3 text-body-secondary">Your cart is empty.</p>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="btn btn-dark rounded-3">Browse listings</a>
  </div>
<?php else : ?>
  <?php foreach ($cartItems as $index => $item) : ?>
    <?php if ($index > 0) : ?>
      <div class="my-0 border-1 border-top"></div>
    <?php endif; ?>
    <div class="cart-list-item d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="cart-img">
          <img src="<?php echo htmlspecialchars($siteBase . $item['image']); ?>" class="rounded-3" width="80" alt="<?php echo htmlspecialchars($item['name']); ?>">
        </div>
        <div class="cart-product-info">
          <p class="mb-0 font-12 listing-brand"><?php echo htmlspecialchars($item['brand']); ?></p>
          <h5 class="product-name fs-6 mb-0"><?php echo htmlspecialchars($item['name']); ?></h5>
          <p class="mb-0 mt-2 font-14 text-body-secondary">
            <?php echo htmlspecialchars($item['condition']); ?> · Sold by <?php echo htmlspecialchars($item['seller']); ?>
          </p>
        </div>
      </div>
      <div class="cart-product-price">
        <p>Price</p>
        <h5 class="mb-0"><?php echo formatPrice($item['price']); ?></h5>
      </div>
      <form action="<?php echo htmlspecialchars($siteBase); ?>cart-actions.php" method="post">
        <input type="hidden" name="action" value="remove">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
        <input type="hidden" name="redirect" value="pages/cart.php">
        <button type="submit" class="btn border border-2 cart-product-btn-delete" aria-label="Remove item">
          <i class="bi bi-x-lg"></i>
        </button>
      </form>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
