<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';

requirePermission('orders.view');

$orders = getPdo()->query(
    "SELECT o.id, o.total_amount, o.status, o.created_at, u.name AS buyer_name, u.email AS buyer_email
     FROM orders o
     JOIN users u ON u.id = o.user_id
     ORDER BY o.created_at DESC"
)->fetchAll();

$total = count($orders);

$adminPageTitle = 'Orders';
$adminPageHeading = 'Orders';
$adminPageSubtitle = '';
$adminActiveNav = 'orders';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-panel">
  <div class="admin-panel-body">
    <div class="table-responsive">
      <table class="table admin-table mb-0">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Buyer</th>
            <th>Date</th>
            <th>Order total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($orders)) : ?>
          <tr><td colspan="5" class="text-body-secondary p-4">No orders yet.</td></tr>
          <?php else : ?>
          <?php foreach ($orders as $order) : ?>
          <tr>
            <td>#<?= (int) $order['id'] ?></td>
            <td>
              <div><?= htmlspecialchars($order['buyer_name']) ?></div>
              <div class="text-body-secondary font-14"><?= htmlspecialchars($order['buyer_email']) ?></div>
            </td>
            <td><?= htmlspecialchars(date('d M Y', strtotime($order['created_at']))) ?></td>
            <td><?= formatAdminPrice($order['total_amount']) ?></td>
            <td><?= adminStatusBadge($order['status']) ?></td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <?php if ($total > 0) : ?>
    <div class="admin-table-footer">Displayed records: 1–<?= $total ?> of <?= $total ?></div>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/includes/layout-end.php'; ?>
