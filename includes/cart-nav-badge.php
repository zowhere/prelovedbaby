<?php
if (!function_exists('getCartCount')) {
    require_once __DIR__ . '/cart.php';
}
$cartCount = getCartCount();
?>
<i class="bi bi-basket2"></i><?php if ($cartCount > 0): ?><span class="notify-badge"><?php echo $cartCount; ?></span><?php endif; ?>
