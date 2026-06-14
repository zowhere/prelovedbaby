<?php
require_once APP_ROOT . '/lib/cart.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$productId = $_POST['id'] ?? $_GET['id'] ?? '';
$redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? 'pages/cart.php';

if (!preg_match('#^pages/[a-z0-9_\-./]+(\?[^#]*)?$#i', $redirect) || str_contains($redirect, '..')) {
    $redirect = 'pages/cart.php';
}

if ($action === 'add') {
    addToCart($productId);
}

if ($action === 'remove') {
    removeFromCart($productId);
}

header('Location: ' . $siteBase . ltrim($redirect, '/'));
exit;
