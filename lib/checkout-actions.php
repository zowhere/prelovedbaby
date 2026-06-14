<?php

require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/cart.php';
require_once APP_ROOT . '/lib/locations.php';
require_once APP_ROOT . '/lib/payment.php';
require_once APP_ROOT . '/lib/orders.php';
require_once APP_ROOT . '/lib/mail.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || ($_POST['action'] ?? '') !== 'place_order') {
    header('Location: ' . $siteBase . 'pages/checkout.php');
    exit;
}

requireLogin($siteBase . 'pages/auth/login.php?redirect=' . urlencode('pages/checkout.php'));

if (getCartCount() === 0) {
    header('Location: ' . $siteBase . 'pages/cart.php?error=' . urlencode('Your cart is empty.'));
    exit;
}

$firstName = trim($_POST['first_name'] ?? '');
$lastName = trim($_POST['last_name'] ?? '');
$email = strtolower(trim($_POST['email'] ?? ''));
$phone = trim($_POST['phone'] ?? '');
$country = trim($_POST['country'] ?? '');
$city = trim($_POST['city'] ?? '');
$street = trim($_POST['street'] ?? '');
$province = isSouthAfrica($country)
    ? trim($_POST['province'] ?? '')
    : trim($_POST['province_region'] ?? '');
$postalCode = trim($_POST['postal_code'] ?? '');
$paymentMethod = $_POST['payment_method'] ?? 'credit-card';

if ($firstName === '' || $lastName === '' || $email === '' || $phone === '' || $country === '' || $city === '' || $street === '' || $postalCode === '') {
    header('Location: ' . $siteBase . 'pages/checkout.php?error=' . urlencode('Please complete all required fields.'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . $siteBase . 'pages/checkout.php?error=' . urlencode('Please enter a valid email address.'));
    exit;
}

if ($paymentMethod !== 'credit-card') {
    header('Location: ' . $siteBase . 'pages/checkout.php?error=' . urlencode('Only card payments are available right now.'));
    exit;
}

$paymentReference = null;
$paymentResult = processStripePayment([
    'name_on_card' => $_POST['name_on_card'] ?? '',
    'card_number' => $_POST['card_number'] ?? '',
    'cvv' => $_POST['cvv'] ?? '',
    'expiry' => $_POST['expiry'] ?? '',
]);

if (!$paymentResult['success']) {
    header('Location: ' . $siteBase . 'pages/checkout.php?error=' . urlencode($paymentResult['error']));
    exit;
}

$paymentReference = $paymentResult['payment_intent_id'];

try {
    $orderResult = createOrderFromCart(getCurrentUser()['id'], 'credit-card', $paymentReference);
} catch (Throwable $e) {
    header('Location: ' . $siteBase . 'pages/checkout.php?error=' . urlencode('Could not create your order. Please try again.'));
    exit;
}

if (!$orderResult['success']) {
    header('Location: ' . $siteBase . 'pages/checkout.php?error=' . urlencode($orderResult['error']));
    exit;
}

$customerName = trim($firstName . ' ' . $lastName);
$receiptResult = sendOrderReceiptEmail($email, $customerName, $orderResult);

$_SESSION['checkout_success'] = [
    'order_id' => $orderResult['order_id'],
    'order_number' => formatOrderNumber($orderResult['order_id']),
    'email' => $email,
    'receipt_sent' => $receiptResult['sent'],
    'total' => $orderResult['total'],
];

header('Location: ' . $siteBase . 'pages/checkout-thankyou.php');
exit;
