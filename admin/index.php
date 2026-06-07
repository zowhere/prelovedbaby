<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/admin-finance.php';

$pdo = getPdo();
$finance = getAdminFinanceStats($pdo);

$stats = [
    'products' => (int) $pdo->query("SELECT COUNT(*) FROM products WHERE status = 'live'")->fetchColumn(),
    'pending_orders' => (int) $pdo->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn(),
    'sellers' => (int) $pdo->query('SELECT COUNT(DISTINCT seller_name) FROM products')->fetchColumn(),
    'users' => (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn(),
    'review_products' => (int) $pdo->query("SELECT COUNT(*) FROM products WHERE status = 'review'")->fetchColumn(),
];

$recentOrders = $pdo->query(
    "SELECT o.id, o.total_amount, o.courier_fee, o.payment_method, o.status, o.created_at, u.name AS buyer_name
     FROM orders o
     JOIN users u ON u.id = o.user_id
     ORDER BY o.created_at DESC
     LIMIT 8"
)->fetchAll();

$recentProducts = $pdo->query(
    'SELECT p.name, p.seller_name, p.price, p.status, p.image
     FROM products p
     ORDER BY p.created_at DESC
     LIMIT 6'
)->fetchAll();

$adminPageTitle = 'Dashboard';
$adminPageHeading = 'Dashboard';
$adminPageSubtitle = '';
$adminActiveNav = 'dashboard';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-info-box admin-info-box--formal">
  <p class="admin-info-box-notice mb-0">(order total − courier fee) × <?= (int) $finance['commission_rate_percent'] ?>% · EFT and other payment methods are not charged this fee.</p>
</div>

<div class="admin-stat-grid">
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Card sales (excl. courier)</div>
    <p class="admin-stat-tile-value"><?= formatAdminMoney($finance['gross_card_sales']) ?></p>
    <p class="admin-stat-tile-note"><?= (int) $finance['card_order_count'] ?> card orders completed</p>
  </div>
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Platform revenue (3%)</div>
    <p class="admin-stat-tile-value"><?= formatAdminMoney($finance['platform_commission']) ?></p>
    <p class="admin-stat-tile-note">Your cut from Stripe card payments</p>
  </div>
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Live listings</div>
    <p class="admin-stat-tile-value"><?= $stats['products'] ?></p>
    <p class="admin-stat-tile-note"><?= $stats['review_products'] ?> awaiting review</p>
  </div>
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Registered users</div>
    <p class="admin-stat-tile-value"><?= $stats['users'] ?></p>
    <p class="admin-stat-tile-note"><?= $stats['sellers'] ?> sellers with listings</p>
  </div>
</div>

<div class="row g-4">
  <div class="col-12 col-xl-7">
    <div class="admin-panel">
      <div class="admin-panel-body">
        <div class="table-responsive">
          <table class="table admin-table mb-0">
            <thead>
              <tr>
                <th>Order</th>
                <th>Buyer</th>
                <th>Payment</th>
                <th>Sale amount</th>
                <th>Our 3%</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($recentOrders)) : ?>
              <tr><td colspan="6" class="text-body-secondary">No orders yet.</td></tr>
              <?php else : ?>
              <?php foreach ($recentOrders as $order) :
                $salesBase = getOrderSalesBase($order['total_amount'], $order['courier_fee']);
                $commission = $order['payment_method'] === 'credit-card'
                    ? calculateCardCommission($salesBase)
                    : 0;
              ?>
              <tr>
                <td>#<?= (int) $order['id'] ?></td>
                <td><?= htmlspecialchars($order['buyer_name']) ?></td>
                <td><?= htmlspecialchars(str_replace('-', ' ', $order['payment_method'])) ?></td>
                <td><?= formatAdminMoney($salesBase) ?></td>
                <td><?= $commission > 0 ? formatAdminMoney($commission) : '—' ?></td>
                <td><?= adminStatusBadge($order['status']) ?></td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <div class="admin-table-footer">Recent orders · <?= count($recentOrders) ?> shown</div>
      </div>
    </div>
  </div>

  <div class="col-12 col-xl-5">
    <div class="admin-panel">
      <div class="admin-panel-body">
        <div class="table-responsive">
          <table class="table admin-table mb-0">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($recentProducts as $product) : ?>
              <tr>
                <td>
                  <?php if ($product['image']) : ?>
                  <img src="../<?= htmlspecialchars($product['image']) ?>" class="admin-table-thumb" alt="">
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= formatAdminPrice($product['price']) ?></td>
                <td><?= adminStatusBadge($product['status']) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="admin-table-footer d-flex justify-content-between align-items-center">
          <span>Displayed records: 1–<?= count($recentProducts) ?> of <?= count($recentProducts) ?></span>
          <?php if (can('products.view')) : ?>
          <a href="products.php" class="text-decoration-none font-14">View all listings</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
