<?php
require_once __DIR__ . '/includes/cart.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$productId = $_POST['id'] ?? $_GET['id'] ?? '';
$redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? 'shopping-cart.php';

// Only allow simple local page names for safety.
$redirect = basename($redirect);

if ($action === 'add') {
    addToCart($productId);
}

if ($action === 'remove') {
    removeFromCart($productId);
}

header('Location: ' . $redirect);
exit;
