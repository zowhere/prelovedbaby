<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php

require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/rbac.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: products.php');
    exit;
}

$action = $_POST['action'] ?? '';
$redirect = 'products.php';

function syncProductCategories($productId, $categoryIds)
{
    $pdo = getPdo();
    $pdo->prepare('DELETE FROM product_categories WHERE product_id = ?')->execute([(int) $productId]);

    $insert = $pdo->prepare('INSERT INTO product_categories (product_id, category_id) VALUES (?, ?)');
    foreach ($categoryIds as $categoryId) {
        $categoryId = (int) $categoryId;
        if ($categoryId > 0) {
            $insert->execute([(int) $productId, $categoryId]);
        }
    }
}

function productFormData()
{
    return [
        'listing_id' => trim($_POST['listing_id'] ?? ''),
        'seller_name' => trim($_POST['seller_name'] ?? ''),
        'brand' => trim($_POST['brand'] ?? ''),
        'name' => trim($_POST['name'] ?? ''),
        'slug' => trim($_POST['slug'] ?? ''),
        'price' => (float) ($_POST['price'] ?? 0),
        'item_condition' => trim($_POST['item_condition'] ?? ''),
        'location' => trim($_POST['location'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'image' => trim($_POST['image'] ?? ''),
        'status' => trim($_POST['status'] ?? 'live'),
        'category_ids' => $_POST['category_ids'] ?? [],
    ];
}

try {
    if ($action === 'create') {
        requirePermission('products.create');

        $data = productFormData();

        if ($data['listing_id'] === '' || $data['name'] === '' || $data['slug'] === '' || $data['price'] <= 0) {
            header('Location: product-form.php?error=' . urlencode('Please fill in all required fields.'));
            exit;
        }

        getPdo()->prepare(
            'INSERT INTO products (listing_id, seller_name, brand, name, slug, price, item_condition, location, description, image, status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        )->execute([
            $data['listing_id'],
            $data['seller_name'],
            $data['brand'],
            $data['name'],
            $data['slug'],
            $data['price'],
            $data['item_condition'],
            $data['location'],
            $data['description'],
            $data['image'],
            $data['status'],
        ]);

        syncProductCategories((int) getPdo()->lastInsertId(), $data['category_ids']);

        header('Location: ' . $redirect . '?success=' . urlencode('Product created successfully.'));
        exit;
    }

    if ($action === 'update') {
        requirePermission('products.edit');

        $productId = (int) ($_POST['id'] ?? 0);
        $data = productFormData();

        if ($productId <= 0 || $data['listing_id'] === '' || $data['name'] === '' || $data['slug'] === '') {
            header('Location: products.php?error=' . urlencode('Invalid product data.'));
            exit;
        }

        getPdo()->prepare(
            'UPDATE products SET listing_id = ?, seller_name = ?, brand = ?, name = ?, slug = ?, price = ?,
             item_condition = ?, location = ?, description = ?, image = ?, status = ? WHERE id = ?'
        )->execute([
            $data['listing_id'],
            $data['seller_name'],
            $data['brand'],
            $data['name'],
            $data['slug'],
            $data['price'],
            $data['item_condition'],
            $data['location'],
            $data['description'],
            $data['image'],
            $data['status'],
            $productId,
        ]);

        syncProductCategories($productId, $data['category_ids']);

        header('Location: ' . $redirect . '?success=' . urlencode('Product updated successfully.'));
        exit;
    }

    if ($action === 'delete') {
        requirePermission('products.delete');

        $productId = (int) ($_POST['id'] ?? 0);
        if ($productId <= 0) {
            header('Location: products.php?error=' . urlencode('Invalid product.'));
            exit;
        }

        getPdo()->prepare('DELETE FROM products WHERE id = ?')->execute([$productId]);
        header('Location: ' . $redirect . '?success=' . urlencode('Product deleted.'));
        exit;
    }
} catch (Throwable $e) {
    header('Location: products.php?error=' . urlencode('Action failed. Check for duplicate listing ID or slug.'));
    exit;
}

header('Location: products.php');
exit;
