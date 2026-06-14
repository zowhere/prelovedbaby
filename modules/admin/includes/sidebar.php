<?php
/** @var string $adminActiveNav */
?>
<aside class="admin-sidebar">
  <div class="admin-brand">
    <div class="admin-brand-title">PreLoved Baby</div>
    <div class="admin-brand-sub">Admin panel</div>
  </div>

  <div class="admin-nav-section">
    <div class="admin-nav-label">Navigation</div>
    <?php if (can('dashboard.view')) : ?>
    <a href="index.php" class="admin-nav-link<?= $adminActiveNav === 'dashboard' ? ' active' : '' ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <?php endif; ?>
    <?php if (can('products.view')) : ?>
    <a href="products.php" class="admin-nav-link<?= $adminActiveNav === 'products' ? ' active' : '' ?>"><i class="bi bi-grid"></i> Listings</a>
    <?php endif; ?>
    <?php if (can('orders.view')) : ?>
    <a href="orders.php" class="admin-nav-link<?= $adminActiveNav === 'orders' ? ' active' : '' ?>"><i class="bi bi-bag-check"></i> Orders</a>
    <?php endif; ?>
    <?php if (can('products.view')) : ?>
    <a href="categories.php" class="admin-nav-link<?= $adminActiveNav === 'categories' ? ' active' : '' ?>"><i class="bi bi-tags"></i> Categories</a>
    <?php endif; ?>
  </div>

  <div class="admin-nav-section">
    <div class="admin-nav-label">Access controls</div>
    <?php if (can('users.view')) : ?>
    <a href="users.php" class="admin-nav-link<?= $adminActiveNav === 'users' ? ' active' : '' ?>"><i class="bi bi-people"></i> Users</a>
    <?php endif; ?>
    <?php if (can('roles.manage')) : ?>
    <a href="roles.php" class="admin-nav-link<?= $adminActiveNav === 'roles' ? ' active' : '' ?>"><i class="bi bi-shield-lock"></i> Roles</a>
    <?php endif; ?>
  </div>

  <div class="admin-nav-section">
    <div class="admin-nav-label">Site</div>
    <a href="../index.php" class="admin-nav-link"><i class="bi bi-box-arrow-up-right"></i> View marketplace</a>
    <a href="logout.php" class="admin-nav-link"><i class="bi bi-box-arrow-right"></i> Log out</a>
  </div>

  <div class="admin-sidebar-spacer"></div>

  <div class="admin-user-card">
    <span class="admin-user-avatar"><?= strtoupper(substr($adminUser['name'], 0, 1)) ?></span>
    <div class="flex-grow-1 min-w-0">
      <div class="admin-user-name text-truncate"><?= htmlspecialchars($adminUser['name']) ?></div>
      <div class="admin-user-role text-truncate"><?= htmlspecialchars($adminUser['role_name']) ?></div>
    </div>
  </div>
</aside>
