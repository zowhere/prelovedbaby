<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';

$productId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isEdit = $productId > 0;

if ($isEdit) {
    requirePermission('products.edit');
} else {
    requirePermission('products.create');
}

$product = [
    'listing_id' => '',
    'seller_id' => '',
    'seller_name' => '',
    'brand' => '',
    'name' => '',
    'slug' => '',
    'price' => '',
    'item_condition' => 'Like New',
    'location' => '',
    'description' => '',
    'image' => '',
    'status' => 'live',
];
$selectedCategoryIds = [];

if ($isEdit) {
    $stmt = getPdo()->prepare('SELECT * FROM products WHERE id = ? LIMIT 1');
    $stmt->execute([$productId]);
    $found = $stmt->fetch();
    if (!$found) {
        header('Location: products.php?error=' . urlencode('Product not found.'));
        exit;
    }
    $product = $found;

    $catStmt = getPdo()->prepare('SELECT category_id FROM product_categories WHERE product_id = ?');
    $catStmt->execute([$productId]);
    $selectedCategoryIds = array_column($catStmt->fetchAll(), 'category_id');
}

$categories = getPdo()->query('SELECT id, name FROM categories ORDER BY name')->fetchAll();
$conditions = ['Like New', 'Good', 'Fair'];
$statuses = ['live', 'review', 'draft'];

$adminPageTitle = $isEdit ? 'Edit product' : 'Add product';
$adminPageHeading = $isEdit ? 'Edit product' : 'Add product';
$adminPageSubtitle = '';
$adminActiveNav = 'products';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-panel">
  <div class="p-4">
        <form action="product-actions.php" method="post">
          <input type="hidden" name="action" value="<?= $isEdit ? 'update' : 'create' ?>">
          <?php if ($isEdit) : ?>
          <input type="hidden" name="id" value="<?= $productId ?>">
          <?php endif; ?>

          <div class="row g-3">
            <div class="col-md-6">
              <label for="listing_id" class="form-label">Listing ID</label>
              <input type="text" class="form-control border-2" id="listing_id" name="listing_id" value="<?= htmlspecialchars($product['listing_id']) ?>" placeholder="PLB-584726" required>
            </div>
            <div class="col-md-6">
              <label for="slug" class="form-label">URL slug</label>
              <input type="text" class="form-control border-2" id="slug" name="slug" value="<?= htmlspecialchars($product['slug']) ?>" placeholder="chicco-pram" required>
            </div>
            <div class="col-md-8">
              <label for="name" class="form-label">Product name</label>
              <input type="text" class="form-control border-2" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="col-md-4">
              <label for="brand" class="form-label">Brand</label>
              <input type="text" class="form-control border-2" id="brand" name="brand" value="<?= htmlspecialchars($product['brand']) ?>" required>
            </div>
            <div class="col-md-4">
              <label for="price" class="form-label">Price (ZAR)</label>
              <input type="number" step="0.01" min="0" class="form-control border-2" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
            </div>
            <div class="col-md-4">
              <label for="item_condition" class="form-label">Condition</label>
              <select class="form-select border-2" id="item_condition" name="item_condition">
                <?php foreach ($conditions as $condition) : ?>
                <option value="<?= htmlspecialchars($condition) ?>"<?= $product['item_condition'] === $condition ? ' selected' : '' ?>><?= htmlspecialchars($condition) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label for="status" class="form-label">Status</label>
              <select class="form-select border-2" id="status" name="status">
                <?php foreach ($statuses as $status) : ?>
                <option value="<?= htmlspecialchars($status) ?>"<?= $product['status'] === $status ? ' selected' : '' ?>><?= htmlspecialchars(ucfirst($status)) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="seller_name" class="form-label">Seller name</label>
              <input type="text" class="form-control border-2" id="seller_name" name="seller_name" value="<?= htmlspecialchars($product['seller_name']) ?>" required>
              <?php if (!empty($product['seller_id'])) : ?>
              <input type="hidden" name="seller_id" value="<?= (int) $product['seller_id'] ?>">
              <div class="form-text">Linked seller account ID: <?= (int) $product['seller_id'] ?></div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <label for="location" class="form-label">Location</label>
              <input type="text" class="form-control border-2" id="location" name="location" value="<?= htmlspecialchars($product['location'] ?? '') ?>" placeholder="Sandton, Johannesburg">
            </div>
            <div class="col-12">
              <label for="image" class="form-label">Image path</label>
              <input type="text" class="form-control border-2" id="image" name="image" value="<?= htmlspecialchars($product['image'] ?? '') ?>" placeholder="images/gallery/products/recommended/chicco-pram.png">
            </div>
            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control border-2" id="description" name="description" rows="4"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
            </div>
            <div class="col-12">
              <label class="form-label">Categories</label>
              <div class="d-flex flex-wrap gap-2">
                <?php foreach ($categories as $category) : ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="category_ids[]" value="<?= (int) $category['id'] ?>" id="cat-<?= (int) $category['id'] ?>"<?= in_array((string) $category['id'], array_map('strval', $selectedCategoryIds), true) ? ' checked' : '' ?>>
                  <label class="form-check-label" for="cat-<?= (int) $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></label>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-dark rounded-3"><?= $isEdit ? 'Save product' : 'Create product' ?></button>
            <a href="products.php" class="btn btn-outline-dark rounded-3">Cancel</a>
          </div>
        </form>
      </div>
    </div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
