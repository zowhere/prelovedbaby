<?php
require_once APP_ROOT . '/lib/db.php';

requirePermission('products.view');

$categories = getPdo()->query(
    'SELECT c.id, c.name, c.slug, COUNT(pc.product_id) AS listing_count
     FROM categories c
     LEFT JOIN product_categories pc ON pc.category_id = c.id
     GROUP BY c.id
     ORDER BY c.name'
)->fetchAll();

$total = count($categories);

$adminPageTitle = 'Categories';
$adminPageHeading = 'Categories';
$adminPageSubtitle = '';
$adminActiveNav = 'categories';

include __DIR__ . '/../includes/layout-start.php';
?>

<div class="admin-panel">
  <div class="admin-panel-body">
    <div class="table-responsive">
      <table class="table admin-table mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Listings</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $category) : ?>
          <tr>
            <td><?= htmlspecialchars($category['name']) ?></td>
            <td><code><?= htmlspecialchars($category['slug']) ?></code></td>
            <td><?= (int) $category['listing_count'] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="admin-table-footer">Displayed records: 1–<?= $total ?> of <?= $total ?></div>
  </div>
</div>

<?php include __DIR__ . '/../includes/layout-end.php'; ?>
