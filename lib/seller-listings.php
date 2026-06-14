<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/auth.php';

function isSeller()
{
    $user = getCurrentUser();

    return $user && ($user['role_slug'] ?? '') === 'seller';
}

function requireSeller($redirect = null)
{
    requireLogin($redirect);

    if (!isSeller()) {
        header('Location: ' . ($redirect ?? getSiteBase() . 'pages/account/profile.php?error=' . urlencode('Seller access only.')));
        exit;
    }
}

function generateListingId()
{
    $pdo = getPdo();

    do {
        $listingId = 'PLB-' . random_int(100000, 999999);
        $stmt = $pdo->prepare('SELECT id FROM products WHERE listing_id = ? LIMIT 1');
        $stmt->execute([$listingId]);
        $exists = $stmt->fetch();
    } while ($exists);

    return $listingId;
}

function generateProductSlug($name)
{
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');

    if ($slug === '') {
        $slug = 'listing';
    }

    $pdo = getPdo();
    $base = $slug;
    $suffix = 1;

    while (true) {
        $stmt = $pdo->prepare('SELECT id FROM products WHERE slug = ? LIMIT 1');
        $stmt->execute([$slug]);
        if (!$stmt->fetch()) {
            return $slug;
        }
        $suffix++;
        $slug = $base . '-' . $suffix;
    }
}

function getSellerListings($sellerId)
{
    $stmt = getPdo()->prepare(
        'SELECT p.*, GROUP_CONCAT(c.name ORDER BY c.name SEPARATOR ", ") AS categories
         FROM products p
         LEFT JOIN product_categories pc ON pc.product_id = p.id
         LEFT JOIN categories c ON c.id = pc.category_id
         WHERE p.seller_id = ?
         GROUP BY p.id
         ORDER BY p.created_at DESC'
    );
    $stmt->execute([(int) $sellerId]);

    return $stmt->fetchAll();
}

function getSellerListingById($listingId, $sellerId)
{
    $stmt = getPdo()->prepare('SELECT * FROM products WHERE id = ? AND seller_id = ? LIMIT 1');
    $stmt->execute([(int) $listingId, (int) $sellerId]);

    return $stmt->fetch() ?: null;
}

function sellerCanEditListing(array $listing)
{
    return in_array($listing['status'] ?? '', ['review', 'draft'], true);
}

function syncListingCategories($productId, $categoryIds)
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

function handleListingImageUpload($existingPath = '')
{
    if (!isset($_FILES['image_file']) || ($_FILES['image_file']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return trim($_POST['image'] ?? $existingPath);
    }

    $file = $_FILES['image_file'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Image upload failed. Please try again.');
    }

    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    $mime = mime_content_type($file['tmp_name']);
    if (!isset($allowed[$mime])) {
        throw new RuntimeException('Please upload a JPG, PNG or WebP image.');
    }

    $uploadDir = APP_ROOT . '/images/uploads';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $filename = 'listing-' . time() . '-' . bin2hex(random_bytes(4)) . '.' . $allowed[$mime];
    $destination = $uploadDir . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new RuntimeException('Could not save the uploaded image.');
    }

    return 'images/uploads/' . $filename;
}

function sellerListingStatusBadge($status)
{
    $classes = [
        'live' => 'bg-success',
        'review' => 'bg-warning text-dark',
        'draft' => 'bg-secondary',
    ];
    $class = $classes[$status] ?? 'bg-light text-dark';

    return '<span class="badge ' . $class . '">' . htmlspecialchars(ucfirst($status)) . '</span>';
}
