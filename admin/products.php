<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';

requirePermission('products.view');

$search = trim($_GET['q'] ?? '');
$sql = 'SELECT p.*, GROUP_CONCAT(c.name ORDER BY c.name SEPARATOR ", ") AS categories
        FROM products p
        LEFT JOIN product_categories pc ON pc.product_id = p.id
        LEFT JOIN categories c ON c.id = pc.category_id';
$params = [];

if ($search !== '') {
    $sql .= ' WHERE p.name LIKE ? OR p.brand LIKE ? OR p.seller_name LIKE ? OR p.listing_id LIKE ?';
    $like = '%' . $search . '%';
    $params = [$like, $like, $like, $like];
}

$sql .= ' GROUP BY p.id ORDER BY p.created_at DESC';

$stmt = getPdo()->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();
$total = count($products);

$adminPageTitle = 'Listings';
$adminPageHeading = 'Listings';
$adminPageSubtitle = '';
$adminActiveNav = 'products';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-toolbar">
  <form class="d-flex gap-2" method="get" action="products.php">
    <input type="search" name="q" class="form-control form-control-sm border" placeholder="Search listings..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit" class="btn btn-sm btn-outline-dark">Search</button>
  </form>
  <?php if (can('products.create')) : ?>
  <a href="product-form.php" class="btn btn-sm btn-dark">Add listing</a>
  <?php endif; ?>
</div>

<div class="admin-panel">
  <div class="admin-panel-body">
    <div class="table-responsive">
      <table class="table admin-table mb-0">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Seller</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($products)) : ?>
          <tr><td colspan="6" class="text-body-secondary p-4">No listings found.</td></tr>
          <?php else : ?>
          <?php foreach ($products as $product) : ?>
          <tr>
            <td>
              <?php if ($product['image']) : ?>
              <img src="<?= htmlspecialchars(adminProductImageUrl($product['image'])) ?>" class="admin-table-thumb" alt="">
              <?php endif; ?>
            </td>
            <td>
              <div class="fw-semibold"><?= htmlspecialchars($product['name']) ?></div>
              <div class="text-body-secondary font-14"><?= htmlspecialchars($product['brand']) ?></div>
            </td>
            <td><?= formatAdminPrice($product['price']) ?></td>
            <td><?= htmlspecialchars($product['seller_name']) ?></td>
            <td><?= adminStatusBadge($product['status']) ?></td>
            <td class="text-end">
              <?php if (can('products.edit')) : ?>
              <a href="product-form.php?id=<?= (int) $product['id'] ?>" class="btn btn-sm btn-outline-dark">Edit</a>
              <?php endif; ?>
              <?php if (can('products.delete')) : ?>
              <form action="product-actions.php" method="post" class="d-inline" onsubmit="return confirm('Delete this listing?');">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= (int) $product['id'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <?php if ($total > 0) : ?>
    <div class="admin-table-footer">Displayed records: 1–<?= $total ?> of <?= $total ?></div>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
