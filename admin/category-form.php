<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';
require_once APP_ROOT . '/lib/categories.php';

$categoryId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isEdit = $categoryId > 0;

if ($isEdit) {
    requirePermission('products.edit');
} else {
    requirePermission('products.create');
}

$category = [
    'name' => '',
    'slug' => '',
];

if ($isEdit) {
    $found = getCategoryById($categoryId);
    if (!$found) {
        header('Location: categories.php?error=' . urlencode('Category not found.'));
        exit;
    }
    $category = $found;
}

$adminPageTitle = $isEdit ? 'Edit category' : 'Add category';
$adminPageHeading = $isEdit ? 'Edit category' : 'Add category';
$adminPageSubtitle = 'Storefront navigation updates automatically when categories change.';
$adminActiveNav = 'categories';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-panel">
  <div class="p-4">
    <form action="category-actions.php" method="post">
      <input type="hidden" name="action" value="<?= $isEdit ? 'update' : 'create' ?>">
      <?php if ($isEdit) : ?>
      <input type="hidden" name="id" value="<?= $categoryId ?>">
      <?php endif; ?>

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control form-control-lg border-2" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
        <div class="form-text">Shown in the Browse Listings menu and Baby Essentials mega menu.</div>
      </div>

      <div class="mb-4">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control form-control-lg border-2" id="slug" name="slug" value="<?= htmlspecialchars($category['slug']) ?>" placeholder="auto-generated from name">
        <div class="form-text">URL-friendly identifier used in shop links (e.g. <code>breast-pumps</code>).</div>
      </div>

      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-dark"><?= $isEdit ? 'Save category' : 'Add category' ?></button>
        <a href="categories.php" class="btn btn-outline-dark">Cancel</a>
      </div>
    </form>
  </div>
</div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
