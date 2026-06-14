<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php
require_once APP_ROOT . '/lib/db.php';
require_once APP_ROOT . '/lib/rbac.php';
require_once APP_ROOT . '/lib/admin-finance.php';
require_once APP_ROOT . '/lib/analytics.php';

requirePermission('dashboard.view');

$pdo = getPdo();

$cardSales = getCardSalesProductTotal();
$platformCommission = getPlatformCommission();
$cardOrderCount = getCardOrderCount();

$stats = [
    'products' => (int) $pdo->query("SELECT COUNT(*) FROM products WHERE status = 'live'")->fetchColumn(),
    'users' => (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn(),
    'review_products' => (int) $pdo->query("SELECT COUNT(*) FROM products WHERE status = 'review'")->fetchColumn(),
    'sellers' => (int) $pdo->query('SELECT COUNT(DISTINCT seller_name) FROM products')->fetchColumn(),
];

$traffic = getTrafficStats(7);

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

$maxTrendViews = 1;
foreach ($traffic['daily_trend'] as $day) {
    $maxTrendViews = max($maxTrendViews, (int) $day['views']);
}

$adminPageTitle = 'Dashboard';
$adminPageHeading = 'Dashboard';
$adminPageSubtitle = 'Marketplace overview, card sales, and web traffic for the last 7 days.';
$adminActiveNav = 'dashboard';

include __DIR__ . '/includes/layout-start.php';
?>

<div class="admin-stat-grid">
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Card sales</div>
    <p class="admin-stat-tile-value"><?= formatAdminPrice($cardSales) ?></p>
    <p class="admin-stat-tile-note">Product revenue from <?= $cardOrderCount ?> paid card order<?= $cardOrderCount === 1 ? '' : 's' ?> (courier excluded)</p>
  </div>
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Platform commission</div>
    <p class="admin-stat-tile-value"><?= formatAdminPrice($platformCommission) ?></p>
    <p class="admin-stat-tile-note">3% commission earned on card product sales</p>
  </div>
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Live listings</div>
    <p class="admin-stat-tile-value"><?= $stats['products'] ?></p>
    <p class="admin-stat-tile-note">Active products on the storefront<?= $stats['review_products'] > 0 ? ' · ' . $stats['review_products'] . ' awaiting review' : '' ?></p>
  </div>
  <div class="admin-stat-tile">
    <div class="admin-stat-tile-label">Registered users</div>
    <p class="admin-stat-tile-value"><?= $stats['users'] ?></p>
    <p class="admin-stat-tile-note">Total customer accounts · <?= $stats['sellers'] ?> sellers with listings</p>
  </div>
</div>

<div class="admin-panel admin-analytics-panel mb-4">
  <div class="admin-panel-header">
    <div>
      <h2 class="admin-panel-title">Web traffic &amp; statistics</h2>
      <p class="admin-panel-subtitle mb-0">Storefront page views for the last <?= (int) $traffic['days'] ?> days. Real visits are tracked automatically.</p>
    </div>
    <?php if ($traffic['has_demo_seed']) : ?>
    <span class="admin-demo-badge">Includes sample demo traffic</span>
    <?php endif; ?>
  </div>
  <div class="admin-panel-body p-3 p-md-4">
    <div class="admin-stat-grid admin-stat-grid--traffic mb-4">
      <div class="admin-stat-tile admin-stat-tile--compact">
        <div class="admin-stat-tile-label">Page views</div>
        <p class="admin-stat-tile-value"><?= (int) $traffic['page_views'] ?></p>
        <p class="admin-stat-tile-note">Total storefront page loads</p>
      </div>
      <div class="admin-stat-tile admin-stat-tile--compact">
        <div class="admin-stat-tile-label">Unique visitors</div>
        <p class="admin-stat-tile-value"><?= (int) $traffic['unique_visitors'] ?></p>
        <p class="admin-stat-tile-note">Distinct browsing sessions</p>
      </div>
      <div class="admin-stat-tile admin-stat-tile--compact">
        <div class="admin-stat-tile-label">Completed orders</div>
        <p class="admin-stat-tile-value"><?= (int) $traffic['completed_orders'] ?></p>
        <p class="admin-stat-tile-note">Paid or completed checkouts</p>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-12 col-lg-4">
        <h3 class="admin-section-heading">7-day trend</h3>
        <?php if (empty($traffic['daily_trend'])) : ?>
        <p class="text-body-secondary small mb-0">No traffic recorded yet.</p>
        <?php else : ?>
        <div class="admin-trend-list">
          <?php foreach ($traffic['daily_trend'] as $day) :
              $views = (int) $day['views'];
              $width = max(8, (int) round(($views / $maxTrendViews) * 100));
          ?>
          <div class="admin-trend-row">
            <span class="admin-trend-label"><?= htmlspecialchars(date('d M', strtotime($day['day']))) ?></span>
            <div class="admin-trend-bar-wrap">
              <div class="admin-trend-bar" style="width: <?= $width ?>%;"></div>
            </div>
            <span class="admin-trend-value"><?= $views ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <div class="col-12 col-lg-4">
        <h3 class="admin-section-heading">Top pages</h3>
        <div class="table-responsive">
          <table class="table admin-table admin-table--compact mb-0">
            <thead>
              <tr>
                <th>Page</th>
                <th class="text-end">Views</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($traffic['top_pages'])) : ?>
              <tr><td colspan="2" class="text-body-secondary">No page views yet.</td></tr>
              <?php else : ?>
              <?php foreach ($traffic['top_pages'] as $page) : ?>
              <tr>
                <td><?= htmlspecialchars(formatAnalyticsPageLabel($page['page_path'])) ?></td>
                <td class="text-end"><?= (int) $page['views'] ?></td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <h3 class="admin-section-heading">Traffic sources</h3>
        <div class="table-responsive">
          <table class="table admin-table admin-table--compact mb-0">
            <thead>
              <tr>
                <th>Source</th>
                <th class="text-end">Visits</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($traffic['traffic_sources'])) : ?>
              <tr><td colspan="2" class="text-body-secondary">No referrer data yet.</td></tr>
              <?php else : ?>
              <?php foreach ($traffic['traffic_sources'] as $source) : ?>
              <tr>
                <td><?= htmlspecialchars(formatTrafficSourceLabel($source['referrer_source'])) ?></td>
                <td class="text-end"><?= (int) $source['visits'] ?></td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-4">
  <div class="col-12 col-xl-7">
    <div class="admin-panel">
      <div class="admin-panel-header px-3 pt-3">
        <h2 class="admin-panel-title">Recent orders</h2>
        <p class="admin-panel-subtitle mb-0">Latest orders placed on the platform</p>
      </div>
      <div class="admin-panel-body">
        <div class="table-responsive">
          <table class="table admin-table mb-0">
            <thead>
              <tr>
                <th>Order</th>
                <th>Buyer</th>
                <th>Payment</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($recentOrders)) : ?>
              <tr><td colspan="5" class="text-body-secondary">No orders yet.</td></tr>
              <?php else : ?>
              <?php foreach ($recentOrders as $order) : ?>
              <tr>
                <td>#<?= (int) $order['id'] ?></td>
                <td><?= htmlspecialchars($order['buyer_name']) ?></td>
                <td><?= htmlspecialchars(ucwords(str_replace('-', ' ', $order['payment_method']))) ?></td>
                <td><?= formatAdminPrice($order['total_amount']) ?></td>
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
      <div class="admin-panel-header px-3 pt-3">
        <h2 class="admin-panel-title">Recent products</h2>
        <p class="admin-panel-subtitle mb-0">Most recently added listings</p>
      </div>
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
              <?php if (empty($recentProducts)) : ?>
              <tr><td colspan="4" class="text-body-secondary">No listings yet.</td></tr>
              <?php else : ?>
              <?php foreach ($recentProducts as $product) : ?>
              <tr>
                <td>
                  <?php if ($product['image']) : ?>
                  <img src="<?= htmlspecialchars(adminProductImageUrl($product['image'])) ?>" class="admin-table-thumb" alt="">
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= formatAdminPrice($product['price']) ?></td>
                <td><?= adminStatusBadge($product['status']) ?></td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
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
