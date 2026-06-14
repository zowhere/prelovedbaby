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
    $cardNumber = preg_replace('/\D/', '', $cardDetails['card_number'] ?? '');
    if ($cardNumber === '') {
        $cardNumber = '4242424242424242';
    }

    usleep(300000);

    return [
        'success' => true,
        'payment_intent_id' => 'pi_fake_' . bin2hex(random_bytes(8)),
        'last4' => strlen($cardNumber) >= 4 ? substr($cardNumber, -4) : '4242',
    ];
}
