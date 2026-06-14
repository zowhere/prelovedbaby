<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/cart.php';

function getProductDbIdBySlug($slug)
{
    $stmt = getPdo()->prepare('SELECT id FROM products WHERE slug = ? LIMIT 1');
    $stmt->execute([$slug]);
    $row = $stmt->fetch();

    return $row ? (int) $row['id'] : null;
}

function createOrderFromCart($userId, $paymentMethod, $paymentReference = null)
{
    $cartItems = getCartItems();

    if ($cartItems === []) {
        return ['success' => false, 'error' => 'Your cart is empty.'];
    }

    $subtotal = getCartSubtotal();
    $courierFee = getCartCourierFee();
    $total = getCartTotal();

    $pdo = getPdo();
    $pdo->beginTransaction();

    try {
        $pdo->prepare(
            'INSERT INTO orders (user_id, total_amount, courier_fee, payment_method, status)
             VALUES (?, ?, ?, ?, ?)'
        )->execute([
            (int) $userId,
            $total,
            $courierFee,
            $paymentMethod,
            'paid',
        ]);

        $orderId = (int) $pdo->lastInsertId();
        $itemStmt = $pdo->prepare(
            'INSERT INTO order_items (order_id, product_id, price) VALUES (?, ?, ?)'
        );

        foreach ($cartItems as $item) {
            $productId = getProductDbIdBySlug($item['id']);
            if ($productId === null) {
                throw new RuntimeException('A product in your cart is no longer available.');
            }

            $itemStmt->execute([$orderId, $productId, $item['price']]);
        }

        $pdo->commit();
        clearCart();

        return [
            'success' => true,
            'order_id' => $orderId,
            'subtotal' => $subtotal,
            'courier_fee' => $courierFee,
            'total' => $total,
            'items' => $cartItems,
            'payment_reference' => $paymentReference,
        ];
    } catch (Throwable $e) {
        $pdo->rollBack();

        return ['success' => false, 'error' => $e->getMessage()];
    }
}

function formatOrderNumber($orderId)
{
    return 'PLB-' . str_pad((string) $orderId, 5, '0', STR_PAD_LEFT);
}
