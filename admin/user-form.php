<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';

$userId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isEdit = $userId > 0;

if ($isEdit) {
    requirePermission('users.edit');
} else {
    requirePermission('users.create');
}

$user = [
    'name' => '',
    'email' => '',
    'role_id' => 5,
    'is_active' => 1,
];

if ($isEdit) {
    $stmt = getPdo()->prepare('SELECT id, name, email, role_id, is_active FROM users WHERE id = ? LIMIT 1');
    $stmt->execute([$userId]);
    $found = $stmt->fetch();
    if (!$found) {
        header('Location: users.php?error=' . urlencode('User not found.'));
        exit;
    }
    $user = $found;
}

$roles = getAllRoles();

$adminPageTitle = $isEdit ? 'Edit user' : 'Add user';
$adminPageHeading = $isEdit ? 'Edit user' : 'Add user';
$adminPageSubtitle = '';
$adminActiveNav = 'users';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-panel">
  <div class="p-4">
        <form action="user-actions.php" method="post">
          <input type="hidden" name="action" value="<?= $isEdit ? 'update' : 'create' ?>">
          <?php if ($isEdit) : ?>
          <input type="hidden" name="id" value="<?= $userId ?>">
          <?php endif; ?>

          <div class="mb-3">
            <label for="name" class="form-label">Full name</label>
            <input type="text" class="form-control form-control-lg border-2" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-lg border-2" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
          </div>

          <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select form-select-lg border-2" id="role_id" name="role_id" required>
              <?php foreach ($roles as $role) : ?>
              <option value="<?= (int) $role['id'] ?>"<?= (int) $user['role_id'] === (int) $role['id'] ? ' selected' : '' ?>>
                <?= htmlspecialchars($role['name']) ?> — <?= htmlspecialchars($role['description'] ?? '') ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label"><?= $isEdit ? 'New password (leave blank to keep current)' : 'Password' ?></label>
            <input type="password" class="form-control form-control-lg border-2" id="password" name="password"<?= $isEdit ? '' : ' required minlength="8"' ?>>
          </div>

          <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"<?= (int) $user['is_active'] ? ' checked' : '' ?>>
            <label class="form-check-label" for="is_active">Account is active</label>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-dark rounded-3"><?= $isEdit ? 'Save changes' : 'Create user' ?></button>
            <a href="users.php" class="btn btn-outline-dark rounded-3">Cancel</a>
          </div>
        </form>
      </div>
    </div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
