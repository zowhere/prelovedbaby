<?php

require_once __DIR__ . '/db.php';

const PLATFORM_COMMISSION_RATE = 0.03;

function getCardSalesProductTotal()
{
    $stmt = getPdo()->query(
        "SELECT COALESCE(SUM(total_amount - courier_fee), 0)
         FROM orders
         WHERE payment_method = 'credit-card'
           AND status IN ('paid', 'completed')"
    );

    return (float) $stmt->fetchColumn();
}

function getPlatformCommission()
{
    return round(getCardSalesProductTotal() * PLATFORM_COMMISSION_RATE, 2);
}

function getCardOrderCount()
{
    $stmt = getPdo()->query(
        "SELECT COUNT(*)
         FROM orders
         WHERE payment_method = 'credit-card'
           AND status IN ('paid', 'completed')"
    );

    return (int) $stmt->fetchColumn();
}
