<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';

requirePermission('roles.manage');

$roles = getAllRoles();
$permissionsGrouped = getAllPermissionsGrouped();

$adminPageTitle = 'Roles';
$adminPageHeading = 'Roles';
$adminPageSubtitle = '';
$adminActiveNav = 'roles';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="row g-4">
  <?php foreach ($roles as $role) :
    $rolePerms = array_column(getRolePermissions($role['id']), 'slug');
  ?>
  <div class="col-12 col-lg-6">
    <div class="admin-panel h-100">
      <div class="p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h2 class="h5 mb-1"><?= htmlspecialchars($role['name']) ?></h2>
            <p class="text-body-secondary mb-0 font-14"><?= htmlspecialchars($role['description'] ?? '') ?></p>
          </div>
          <span class="badge text-bg-dark"><?= htmlspecialchars($role['slug']) ?></span>
        </div>
        <?php foreach ($permissionsGrouped as $module => $permissions) : ?>
        <div class="mb-3">
          <p class="fw-semibold mb-2 text-capitalize"><?= htmlspecialchars($module) ?></p>
          <ul class="list-unstyled mb-0">
            <?php foreach ($permissions as $permission) : ?>
            <li class="d-flex align-items-center gap-2 mb-1 font-14">
              <?php if (in_array($permission['slug'], $rolePerms, true)) : ?>
              <i class="bi bi-check-circle-fill text-success"></i>
              <?php else : ?>
              <i class="bi bi-x-circle text-body-secondary"></i>
              <?php endif; ?>
              <?= htmlspecialchars($permission['name']) ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<div class="admin-panel mt-4">
  <div class="p-4">
    <h2 class="h5 mb-3">RBAC summary</h2>
    <div class="table-responsive">
      <table class="table admin-table table-sm mb-0">
        <thead>
          <tr>
            <th>Permission</th>
            <?php foreach ($roles as $role) : ?>
            <th><?= htmlspecialchars($role['name']) ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $allPerms = getPdo()->query('SELECT slug, name FROM permissions ORDER BY module, name')->fetchAll();
          $rolePermMap = [];
          foreach ($roles as $role) {
              $rolePermMap[$role['id']] = array_column(getRolePermissions($role['id']), 'slug');
          }
          foreach ($allPerms as $perm) :
          ?>
          <tr>
            <td><?= htmlspecialchars($perm['name']) ?></td>
            <?php foreach ($roles as $role) : ?>
            <td class="text-center">
              <?= in_array($perm['slug'], $rolePermMap[$role['id']], true) ? '✓' : '—' ?>
            </td>
            <?php endforeach; ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
