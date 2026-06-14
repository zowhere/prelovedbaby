<?php
/** @var string $adminActiveNav */
?>
<aside class="admin-sidebar p-3 p-lg-4">
  <div class="mb-4">
    <a href="index.php" class="text-decoration-none">
      <span class="logo-text fs-5 fw-semibold">PreLoved Baby</span>
    </a>
    <p class="text-white-50 small mb-0 mt-1">Admin panel</p>
  </div>

  <nav class="d-flex flex-column gap-1">
    <?php if (can('dashboard.view')) : ?>
    <a href="index.php" class="admin-nav-link<?= $adminActiveNav === 'dashboard' ? ' active' : '' ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <?php endif; ?>

    <?php if (can('products.view')) : ?>
    <a href="products.php" class="admin-nav-link<?= $adminActiveNav === 'products' ? ' active' : '' ?>"><i class="bi bi-grid"></i> Products</a>
    <?php endif; ?>

    <?php if (can('users.view')) : ?>
    <a href="users.php" class="admin-nav-link<?= $adminActiveNav === 'users' ? ' active' : '' ?>"><i class="bi bi-people"></i> Users</a>
    <?php endif; ?>

    <?php if (can('roles.manage')) : ?>
    <a href="roles.php" class="admin-nav-link<?= $adminActiveNav === 'roles' ? ' active' : '' ?>"><i class="bi bi-shield-lock"></i> Roles &amp; RBAC</a>
    <?php endif; ?>

    <a href="../index.php" class="admin-nav-link mt-2"><i class="bi bi-box-arrow-up-right"></i> View site</a>
    <a href="logout.php" class="admin-nav-link"><i class="bi bi-box-arrow-right"></i> Log out</a>
  </nav>
</aside>
