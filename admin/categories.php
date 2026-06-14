<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';
require_once APP_ROOT . '/lib/categories.php';

requirePermission('products.view');

$categories = getCategoriesWithCounts();
$total = count($categories);

$adminPageTitle = 'Categories';
$adminPageHeading = 'Categories';
$adminPageSubtitle = 'Manage storefront navigation menus. Changes appear in Browse Listings and Baby Essentials automatically.';
$adminActiveNav = 'categories';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-toolbar">
  <p class="text-body-secondary mb-0 small">Navigation menus are driven by this category list.</p>
  <?php if (can('products.create')) : ?>
  <a href="category-form.php" class="btn btn-sm btn-dark">Add category</a>
  <?php endif; ?>
</div>

<div class="admin-panel">
  <div class="admin-panel-body">
    <div class="table-responsive">
      <table class="table admin-table mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Listings</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($categories)) : ?>
          <tr><td colspan="4" class="text-body-secondary p-4">No categories yet. Add one to populate the storefront menu.</td></tr>
          <?php else : ?>
          <?php foreach ($categories as $category) : ?>
          <tr>
            <td><?= htmlspecialchars($category['name']) ?></td>
            <td><code><?= htmlspecialchars($category['slug']) ?></code></td>
            <td><?= (int) $category['listing_count'] ?></td>
            <td class="text-end">
              <div class="d-inline-flex gap-2">
                <?php if (can('products.edit')) : ?>
                <a href="category-form.php?id=<?= (int) $category['id'] ?>" class="btn btn-sm btn-outline-dark">Edit</a>
                <?php endif; ?>
                <?php if (can('products.delete')) : ?>
                <form action="category-actions.php" method="post" class="d-inline" onsubmit="return confirm('Delete this category? Listings must be reassigned first.');">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?= (int) $category['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger"<?= (int) $category['listing_count'] > 0 ? ' disabled title="Reassign linked listings before deleting"' : '' ?>>Delete</button>
                </form>
                <?php endif; ?>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="admin-table-footer">Displayed records: 1–<?= $total ?> of <?= $total ?></div>
  </div>
</div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
