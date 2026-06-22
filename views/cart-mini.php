<?php
$siteBase = $siteBase ?? '/';
$cartItems = getCartItems();
$cartRedirect = $cartRedirect ?? basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
?>

<?php if (empty($cartItems)) : ?>
  <p class="text-body-secondary mb-0">Your cart is empty.</p>
<?php else : ?>
  <?php foreach ($cartItems as $index => $item) : ?>
    <?php if ($index > 0) : ?>
      <hr class="border-bottom border-1 border">
    <?php endif; ?>
    <div class="cart-product-list-item d-flex align-items-center gap-3">
      <div class="flex-shrink-0">
        <a href="<?php echo htmlspecialchars($siteBase . $item['url']); ?>">
          <img src="<?php echo htmlspecialchars($siteBase . $item['image']); ?>" width="100" class="cart-product-img rounded-3" alt="<?php echo htmlspecialchars($item['name']); ?>">
        </a>
      </div>
      <div class="cart-product-info flex-grow-1">
        <p class="mb-1 cart-product-name"><?php echo htmlspecialchars($item['name']); ?></p>
        <h5 class="mb-0 cart-product-price"><?php echo formatPrice($item['price']); ?></h5>
        <form action="<?php echo htmlspecialchars($siteBase); ?>cart-actions.php" method="post" class="d-flex align-items-center justify-content-end mt-2">
          <input type="hidden" name="action" value="remove">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
          <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($cartRedirect); ?>">
          <button type="submit" class="cart-product-btn-delete btn btn-outline-dark border btn-sm rounded-3" aria-label="Remove item">
            <i class="bi bi-trash3"></i>
          </button>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
