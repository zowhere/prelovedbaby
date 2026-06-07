<?php

const PLATFORM_CARD_COMMISSION_RATE = 0.03;

function getOrderSalesBase($totalAmount, $courierFee)
{
    return max(0, (float) $totalAmount - (float) $courierFee);
}

function calculateCardCommission($salesBase)
{
    return round((float) $salesBase * PLATFORM_CARD_COMMISSION_RATE, 2);
}

function getAdminFinanceStats(PDO $pdo)
{
    $cardOrders = $pdo->query(
        "SELECT total_amount, courier_fee
         FROM orders
         WHERE payment_method = 'credit-card'
           AND status IN ('completed', 'paid', 'shipped')"
    )->fetchAll();

    $grossCardSales = 0.0;
    $platformCommission = 0.0;

    foreach ($cardOrders as $order) {
        $salesBase = getOrderSalesBase($order['total_amount'], $order['courier_fee']);
        $grossCardSales += $salesBase;
        $platformCommission += calculateCardCommission($salesBase);
    }

    $allCompleted = $pdo->query(
        "SELECT COALESCE(SUM(total_amount), 0) FROM orders WHERE status IN ('completed', 'paid', 'shipped')"
    )->fetchColumn();

    return [
        'card_order_count' => count($cardOrders),
        'gross_card_sales' => $grossCardSales,
        'platform_commission' => $platformCommission,
        'commission_rate_percent' => PLATFORM_CARD_COMMISSION_RATE * 100,
        'total_completed_sales' => (float) $allCompleted,
    ];
}

function formatAdminMoney($amount)
{
    return 'R ' . number_format((float) $amount, 2, '.', ',');
}
