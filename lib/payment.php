<?php

require_once __DIR__ . '/db.php';

function getPaymentMode()
{
    $config = getDbConfig();
    $env = getenv('PAYMENT_MODE');

    if ($env !== false && $env !== '') {
        return strtolower($env);
    }

    return strtolower($config['payment_mode'] ?? 'fake');
}

function isFakeStripeEnabled()
{
    return getPaymentMode() === 'fake';
}

function processStripePayment(array $cardDetails)
{
    if (isFakeStripeEnabled()) {
        return processFakeStripePayment($cardDetails);
    }

    return ['success' => false, 'error' => 'Live Stripe payments are not configured. Set PAYMENT_MODE=fake for demo use.'];
}

function processFakeStripePayment(array $cardDetails)
{
    $nameOnCard = trim($cardDetails['name_on_card'] ?? '');
    $cardNumber = preg_replace('/\D/', '', $cardDetails['card_number'] ?? '');
    $cvv = trim($cardDetails['cvv'] ?? '');
    $expiry = trim($cardDetails['expiry'] ?? '');

    if ($nameOnCard === '') {
        return ['success' => false, 'error' => 'Please enter the name on your card.'];
    }

    if (strlen($cardNumber) < 13 || strlen($cardNumber) > 19) {
        return ['success' => false, 'error' => 'Please enter a valid card number.'];
    }

    if (!preg_match('/^\d{3,4}$/', $cvv)) {
        return ['success' => false, 'error' => 'Please enter a valid CVV.'];
    }

    if ($expiry === '') {
        return ['success' => false, 'error' => 'Please enter your card expiry date.'];
    }

    $expiryTimestamp = strtotime($expiry);
    if ($expiryTimestamp === false) {
        return ['success' => false, 'error' => 'Please enter a valid expiry date.'];
    }

    $expiryEnd = strtotime(date('Y-m-t 23:59:59', $expiryTimestamp));
    if ($expiryEnd < time()) {
        return ['success' => false, 'error' => 'This card has expired.'];
    }

    usleep(300000);

    return [
        'success' => true,
        'payment_intent_id' => 'pi_fake_' . bin2hex(random_bytes(8)),
        'last4' => substr($cardNumber, -4),
    ];
}
