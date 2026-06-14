<?php
/** @var string $adminActiveNav */
?>
<button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter"
  class="btn btn-dark d-lg-none btn-filter-mobile rounded-bottom-0 d-flex align-items-center gap-2 px-4"><i
    class="bi bi-funnel"></i><span>Admin</span></button>
<nav class="navbar navbar-expand-lg p-0">
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasFilter"
    aria-labelledby="offcanvasFilterLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasFilterLabel">Admin panel</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="my-account-menu w-100 border rounded-3 p-3">
        <div class="list-group list-group-flush">
          <?php if (can('dashboard.view')) : ?>
          <a href="index.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $adminActiveNav === 'dashboard' ? ' active' : '' ?>"><span><i class="bi bi-speedometer2"></i></span>Dashboard</a>
          <?php endif; ?>
          <?php if (can('products.view')) : ?>
          <a href="products.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $adminActiveNav === 'products' ? ' active' : '' ?>"><span><i class="bi bi-grid"></i></span>Products</a>
          <?php endif; ?>
          <?php if (can('users.view')) : ?>
          <a href="users.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $adminActiveNav === 'users' ? ' active' : '' ?>"><span><i class="bi bi-people"></i></span>Users</a>
          <?php endif; ?>
          <?php if (can('roles.manage')) : ?>
          <a href="roles.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3<?= $adminActiveNav === 'roles' ? ' active' : '' ?>"><span><i class="bi bi-shield-lock"></i></span>Roles &amp; RBAC</a>
          <?php endif; ?>
          <a href="../index.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-box-arrow-up-right"></i></span>View site</a>
          <a href="logout.php" class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-3"><span><i class="bi bi-box-arrow-left"></i></span>Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>
