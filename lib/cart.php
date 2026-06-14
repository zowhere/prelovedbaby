<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/products.php';
require_once __DIR__ . '/../helpers/courier-copy.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function addToCart($productId)
{
    global $products;

    if (!isset($products[$productId])) {
        return false;
    }

    
    if (!in_array($productId, $_SESSION['cart'], true)) {
        $_SESSION['cart'][] = $productId;
    }

    return true;
}

function removeFromCart($productId)
{
    $_SESSION['cart'] = array_values(array_filter(
        $_SESSION['cart'],
        function ($id) use ($productId) {
            return $id !== $productId;
        }
    ));
}

function clearCart()
{
    $_SESSION['cart'] = [];
}

function getCartItems()
{
    global $products;

    $items = [];

    foreach ($_SESSION['cart'] as $productId) {
        if (isset($products[$productId])) {
            $items[] = $products[$productId];
        }
    }

    return $items;
}

function getCartCount()
{
    return count($_SESSION['cart']);
}

function getCartSubtotal()
{
    $total = 0;

    foreach (getCartItems() as $item) {
        $total += $item['price'];
    }

    return $total;
}

function getCartCourierFee()
{
    $sellerCount = count(array_unique(array_column(getCartItems(), 'seller')));

    if ($sellerCount === 0) {
        return 0;
    }

    // R80 fee per seller (The Courier Guy, PAXI or PostNet).
    return $sellerCount * 80;
}

function getCartTotal()
{
    return getCartSubtotal() + getCartCourierFee();
}

function formatPrice($amount)
{
    return 'R ' . number_format($amount, 0, '.', ',');
}

function getUniqueSellerCount()
{
    return count(array_unique(array_column(getCartItems(), 'seller')));
}
