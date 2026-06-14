<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';

requirePermission('users.view');

$users = getPdo()->query(
    'SELECT u.id, u.name, u.email, u.is_active, u.created_at, r.name AS role_name, r.slug AS role_slug
     FROM users u
     JOIN roles r ON r.id = u.role_id
     ORDER BY u.created_at DESC'
)->fetchAll();

$total = count($users);

$adminPageTitle = 'Users';
$adminPageHeading = 'Users';
$adminPageSubtitle = '';
$adminActiveNav = 'users';

include __DIR__ . '/../includes/layout-start.php';
?>

<div class="admin-toolbar">
  <p class="text-body-secondary mb-0">Manage accounts and assign RBAC roles.</p>
  <?php if (can('users.create')) : ?>
  <a href="user-form.php" class="btn btn-sm btn-dark">Add user</a>
  <?php endif; ?>
</div>

<div class="admin-panel">
  <div class="admin-panel-body">
    <div class="table-responsive">
      <table class="table admin-table mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Joined</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
          <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['role_name']) ?></td>
            <td><?= (int) $user['is_active'] ? 'Active' : 'Inactive' ?></td>
            <td><?= htmlspecialchars(date('d M Y', strtotime($user['created_at']))) ?></td>
            <td class="text-end">
              <?php if (can('users.edit')) : ?>
              <a href="user-form.php?id=<?= (int) $user['id'] ?>" class="btn btn-sm btn-outline-dark">Edit</a>
              <?php endif; ?>
              <?php if (can('users.delete') && (int) $user['id'] !== (int) $adminUser['id']) : ?>
              <form action="user-actions.php" method="post" class="d-inline" onsubmit="return confirm('Delete this user?');">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="admin-table-footer">Displayed records: 1–<?= $total ?> of <?= $total ?></div>
  </div>
</div>

<?php include __DIR__ . '/../includes/layout-end.php'; ?>
