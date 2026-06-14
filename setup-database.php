<?php
require_once __DIR__ . '/bootstrap.php';

require_once APP_ROOT . '/lib/db.php';

$config = require __DIR__ . '/config/config.php';
$error = null;
$seedUsers = [
    [
        'name' => 'Admin User',
        'email' => 'admin@prelovedbaby.co.za',
        'password' => 'Admin123!',
        'role_id' => 1,
    ],
    [
        'name' => 'Zoe Bulle',
        'email' => 'zoe.bulle@prelovedbaby.co.za',
        'password' => 'Preloved123',
        'role_id' => 1,
    ],
    [
        'name' => 'Store Manager',
        'email' => 'manager@prelovedbaby.co.za',
        'password' => 'Manager123',
        'role_id' => 3,
    ],
    [
        'name' => 'Demo Seller',
        'email' => 'seller@prelovedbaby.co.za',
        'password' => 'Seller123!',
        'role_id' => 6,
    ],
];

try {
    $c = $config;
    $pdo = new PDO(
        sprintf('mysql:host=%s;charset=%s', $c['db_host'], $c['db_charset']),
        $c['db_user'],
        $c['db_pass'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $db = str_replace('`', '``', $c['db_name']);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$db`");
    $pdo->exec(file_get_contents(__DIR__ . '/database/setup.sql'));
    $pdo->exec(file_get_contents(__DIR__ . '/database/sample-data.sql'));
    $pdo->exec("UPDATE products SET image = REPLACE(image, 'assets/', '') WHERE image LIKE 'assets/%'");

    $stmt = $pdo->prepare(
        'INSERT INTO users (name, email, password_hash, role_id, is_active) VALUES (?, ?, ?, ?, 1)
         ON DUPLICATE KEY UPDATE name = VALUES(name), password_hash = VALUES(password_hash), role_id = VALUES(role_id), is_active = 1'
    );

    foreach ($seedUsers as $user) {
        $stmt->execute([
            $user['name'],
            $user['email'],
            password_hash($user['password'], PASSWORD_DEFAULT),
            $user['role_id'],
        ]);
    }

    $pdo->exec(
        "INSERT INTO roles (id, name, slug, description) VALUES
        (6, 'Seller', 'seller', 'Marketplace seller — can list and sell items')
        ON DUPLICATE KEY UPDATE name = VALUES(name), description = VALUES(description)"
    );

    $buyerId = (int) $pdo->query("SELECT id FROM users WHERE email = 'zoe.bulle@prelovedbaby.co.za' LIMIT 1")->fetchColumn();
    if ($buyerId > 0) {
        $pdo->exec(
            "INSERT INTO orders (user_id, total_amount, courier_fee, payment_method, status, created_at) VALUES
            ($buyerId, 4580.00, 80.00, 'credit-card', 'completed', '2025-03-12 10:15:00'),
            ($buyerId, 2880.00, 80.00, 'credit-card', 'completed', '2025-03-18 14:22:00'),
            ($buyerId, 12580.00, 80.00, 'credit-card', 'paid', '2025-03-28 09:40:00'),
            ($buyerId, 1800.00, 0.00, 'eft', 'completed', '2025-03-20 16:05:00'),
            ($buyerId, 3580.00, 80.00, 'credit-card', 'pending', '2025-04-02 11:30:00')"
        );
        $pdo->exec(
            "INSERT IGNORE INTO order_items (order_id, product_id, price)
             SELECT o.id, p.id, p.price
             FROM orders o
             JOIN products p ON (
               (o.total_amount = 4580.00 AND p.slug = 'chicco-pram')
               OR (o.total_amount = 2880.00 AND p.slug = 'breast-pump')
               OR (o.total_amount = 12580.00 AND p.slug = 'bugaboo-fox')
               OR (o.total_amount = 1800.00 AND p.slug = 'high-chair')
               OR (o.total_amount = 3580.00 AND p.slug = 'car-seat')
             )"
        );
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Setup database · PreLoved Baby</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <h1 class="h4 mb-3">Database setup</h1>
            <?php if ($error): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
              <p class="mb-0 small text-muted">Start MySQL, then check <code>config/config.php</code>.</p>
            <?php else: ?>
              <div class="alert alert-success">Database ready with RBAC roles, permissions, users, products and orders tables.</div>
              <div class="alert alert-info mb-0">
                <strong>Admin login</strong> (Super Admin):<br>
                <code>admin@prelovedbaby.co.za</code> / <code>Admin123!</code><br><br>
                <strong>Manager login</strong> (products only):<br>
                <code>manager@prelovedbaby.co.za</code> / <code>Manager123</code><br><br>
                <strong>Seller login</strong> (list items):<br>
                <code>seller@prelovedbaby.co.za</code> / <code>Seller123!</code>
              </div>
              <a href="admin/login.php" class="btn btn-dark mt-3 me-2">Go to admin</a>
              <a href="pages/auth/login.php" class="btn btn-outline-dark mt-3">Storefront login</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
