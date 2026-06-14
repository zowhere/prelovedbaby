<?php

require_once __DIR__ . '/bootstrap.php';
require_once APP_ROOT . '/lib/seller-listings.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $siteBase . 'pages/account/listings.php');
    exit;
}

requireSeller();

$action = $_POST['action'] ?? '';
$user = getCurrentUser();
$redirectListings = $siteBase . 'pages/account/listings.php';

function sellerListingFormData()
{
    return [
        'name' => trim($_POST['name'] ?? ''),
        'brand' => trim($_POST['brand'] ?? ''),
        'price' => (float) ($_POST['price'] ?? 0),
        'item_condition' => trim($_POST['item_condition'] ?? ''),
        'location' => trim($_POST['location'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'category_ids' => $_POST['category_ids'] ?? [],
    ];
}

try {
    if ($action === 'create') {
        if (!can('listings.create')) {
            header('Location: ' . $redirectListings . '?error=' . urlencode('You do not have permission to create listings.'));
            exit;
        }

        $data = sellerListingFormData();
        if ($data['name'] === '' || $data['brand'] === '' || $data['price'] <= 0) {
            header('Location: ' . $siteBase . 'pages/account/listing-form.php?error=' . urlencode('Please fill in all required fields.'));
            exit;
        }

        $imagePath = handleListingImageUpload();
        $listingId = generateListingId();
        $slug = generateProductSlug($data['name']);

        getPdo()->prepare(
            'INSERT INTO products (listing_id, seller_id, seller_name, brand, name, slug, price, item_condition, location, description, image, status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        )->execute([
            $listingId,
            $user['id'],
            $user['name'],
            $data['brand'],
            $data['name'],
            $slug,
            $data['price'],
            $data['item_condition'],
            $data['location'],
            $data['description'],
            $imagePath,
            'review',
        ]);

        syncListingCategories((int) getPdo()->lastInsertId(), $data['category_ids']);

        header('Location: ' . $redirectListings . '?success=' . urlencode('Listing submitted for review. We will notify you once it is approved.'));
        exit;
    }

    if ($action === 'update') {
        if (!can('listings.edit_own')) {
            header('Location: ' . $redirectListings . '?error=' . urlencode('You do not have permission to edit listings.'));
            exit;
        }

        $productId = (int) ($_POST['id'] ?? 0);
        $listing = getSellerListingById($productId, $user['id']);

        if (!$listing || !sellerCanEditListing($listing)) {
            header('Location: ' . $redirectListings . '?error=' . urlencode('This listing cannot be edited.'));
            exit;
        }

        $data = sellerListingFormData();
        if ($data['name'] === '' || $data['brand'] === '' || $data['price'] <= 0) {
            header('Location: ' . $siteBase . 'pages/account/listing-form.php?id=' . $productId . '&error=' . urlencode('Please fill in all required fields.'));
            exit;
        }

        $imagePath = handleListingImageUpload($listing['image'] ?? '');
        $slug = $listing['slug'];
        if ($data['name'] !== $listing['name']) {
            $slug = generateProductSlug($data['name']);
        }

        getPdo()->prepare(
            'UPDATE products SET seller_name = ?, brand = ?, name = ?, slug = ?, price = ?,
             item_condition = ?, location = ?, description = ?, image = ?, status = ?
             WHERE id = ? AND seller_id = ?'
        )->execute([
            $user['name'],
            $data['brand'],
            $data['name'],
            $slug,
            $data['price'],
            $data['item_condition'],
            $data['location'],
            $data['description'],
            $imagePath,
            'review',
            $productId,
            $user['id'],
        ]);

        syncListingCategories($productId, $data['category_ids']);

        header('Location: ' . $redirectListings . '?success=' . urlencode('Listing updated and sent for review.'));
        exit;
    }
} catch (Throwable $e) {
    $formUrl = $siteBase . 'pages/account/listing-form.php';
    if (($action === 'update') && !empty($_POST['id'])) {
        $formUrl .= '?id=' . (int) $_POST['id'] . '&error=' . urlencode($e->getMessage());
    } else {
        $formUrl .= '?error=' . urlencode($e->getMessage());
    }
    header('Location: ' . $formUrl);
    exit;
}

header('Location: ' . $redirectListings);
exit;
