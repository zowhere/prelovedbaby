<?php
$siteBase = $siteBase ?? '';
$accountMenuActive = $accountMenuActive ?? '';
require_once APP_ROOT . '/lib/auth.php';
$showSellerMenu = isLoggedIn() && (getCurrentUser()['role_slug'] ?? '') === 'seller';
?>
<div class="my-account-menu w-100 border rounded-3 p-3">
  <div class="list-group list-group-flush">
    <?php if ($showSellerMenu): ?>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listings.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $accountMenuActive === 'listings' ? ' active' : '' ?>"><span><i class="bi bi-tag"></i></span>My Listings</a>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/listing-form.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $accountMenuActive === 'listing-form' ? ' active' : '' ?>"><span><i class="bi bi-plus-circle"></i></span>Add Listing</a>
    <?php endif; ?>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/orders.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $accountMenuActive === 'orders' ? ' active' : '' ?>"><span><i class="bi bi-bag-check"></i></span>My Orders</a>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/payment-methods.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $accountMenuActive === 'payment-methods' ? ' active' : '' ?>"><span><i class="bi bi-wallet"></i></span>Payment Methods</a>
    <a href="javascript:;" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-star"></i></span>My Reviews</a>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/profile.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $accountMenuActive === 'profile' ? ' active' : '' ?>"><span><i class="bi bi-person-square"></i></span>My Profile</a>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/account/addresses.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $accountMenuActive === 'addresses' ? ' active' : '' ?>"><span><i class="bi bi-geo-alt"></i></span>Addresses</a>
    <a href="<?= htmlspecialchars($siteBase) ?>pages/auth/logout.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-box-arrow-left"></i></span>Logout</a>
  </div>
</div>
