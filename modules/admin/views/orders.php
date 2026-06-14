<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/admin-finance.php';

requirePermission('orders.view');

$orders = getPdo()->query(
    "SELECT o.id, o.total_amount, o.courier_fee, o.payment_method, o.status, o.created_at, u.name AS buyer_name, u.email AS buyer_email
     FROM orders o
     JOIN users u ON u.id = o.user_id
     ORDER BY o.created_at DESC"
)->fetchAll();

$finance = getAdminFinanceStats(getPdo());
$total = count($orders);

$adminPageTitle = 'Orders';
$adminPageHeading = 'Orders';
$adminPageSubtitle = '';
$adminActiveNav = 'orders';

include __DIR__ . '/../includes/layout-start.php';
?>

<div class="admin-info-box">
  <p class="mb-1"><strong>Total platform revenue from card sales:</strong> <?= formatAdminMoney($finance['platform_commission']) ?></p>
  <p class="mb-0">Only credit card orders contribute the <?= (int) $finance['commission_rate_percent'] ?>% fee. Courier fees are excluded from the calculation.</p>
</div>

<div class="admin-panel">
  <div class="admin-panel-body">
    <div class="table-responsive">
      <table class="table admin-table mb-0">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Buyer</th>
            <th>Date</th>
            <th>Payment</th>
            <th>Order total</th>
            <th>Sale amount</th>
            <th>Platform 3%</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($orders)) : ?>
          <tr><td colspan="8" class="text-body-secondary p-4">No orders yet.</td></tr>
          <?php else : ?>
          <?php foreach ($orders as $order) :
            $salesBase = getOrderSalesBase($order['total_amount'], $order['courier_fee']);
            $commission = $order['payment_method'] === 'credit-card'
                ? calculateCardCommission($salesBase)
                : 0;
          ?>
          <tr>
            <td>#<?= (int) $order['id'] ?></td>
            <td>
              <div><?= htmlspecialchars($order['buyer_name']) ?></div>
              <div class="text-body-secondary font-14"><?= htmlspecialchars($order['buyer_email']) ?></div>
            </td>
            <td><?= htmlspecialchars(date('d M Y', strtotime($order['created_at']))) ?></td>
            <td><?= htmlspecialchars(str_replace('-', ' ', $order['payment_method'])) ?></td>
            <td><?= formatAdminMoney($order['total_amount']) ?></td>
            <td><?= formatAdminMoney($salesBase) ?></td>
            <td><?= $commission > 0 ? formatAdminMoney($commission) : '—' ?></td>
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

<?php include __DIR__ . '/../includes/layout-end.php'; ?>
