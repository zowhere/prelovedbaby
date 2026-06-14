<?php

require_once __DIR__ . '/db.php';

function ensurePageViewsTable()
{
    getPdo()->exec(
        'CREATE TABLE IF NOT EXISTS page_views (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            session_id VARCHAR(64) NOT NULL,
            page_path VARCHAR(255) NOT NULL,
            referrer_source VARCHAR(80) NOT NULL DEFAULT \'direct\',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_page_views_created (created_at),
            INDEX idx_page_views_session (session_id),
            INDEX idx_page_views_path (page_path)
        )'
    );
}

function isAnalyticsBot()
{
    $agent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    if ($agent === '') {
        return true;
    }

    return (bool) preg_match('/bot|crawl|spider|slurp|curl|wget|python-requests|headless/i', $agent);
}

function analyticsReferrerSource()
{
    $referrer = trim($_SERVER['HTTP_REFERER'] ?? '');

    if ($referrer === '') {
        return 'direct';
    }

    $host = strtolower(parse_url($referrer, PHP_URL_HOST) ?? '');

    if ($host === '') {
        return 'referral';
    }

    if (str_contains($host, 'google.')) {
        return 'google';
    }

    if (str_contains($host, 'facebook.') || str_contains($host, 'fb.')) {
        return 'facebook';
    }

    if (str_contains($host, 'instagram.')) {
        return 'instagram';
    }

    return 'referral';
}

function trackPageView()
{
    if (PHP_SAPI === 'cli' || isAnalyticsBot()) {
        return;
    }

    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');

    if (str_contains($script, '/admin/')) {
        return;
    }

    try {
        ensurePageViewsTable();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION['analytics_session_id'])) {
            $_SESSION['analytics_session_id'] = bin2hex(random_bytes(16));
        }

        $pagePath = $script !== '' ? $script : '/';
        $query = $_SERVER['QUERY_STRING'] ?? '';

        if ($query !== '') {
            $pagePath .= '?' . $query;
        }

        if (strlen($pagePath) > 255) {
            $pagePath = substr($pagePath, 0, 255);
        }

        $stmt = getPdo()->prepare(
            'INSERT INTO page_views (session_id, page_path, referrer_source) VALUES (?, ?, ?)'
        );
        $stmt->execute([
            $_SESSION['analytics_session_id'],
            $pagePath,
            analyticsReferrerSource(),
        ]);
    } catch (Throwable $e) {
        // Tracking must never break the storefront.
    }
}

function seedDemoTrafficIfEmpty()
{
    try {
        ensurePageViewsTable();

        $count = (int) getPdo()->query('SELECT COUNT(*) FROM page_views')->fetchColumn();

        if ($count > 0) {
            return false;
        }

        $rows = [
            ['sess_demo_01', '/index.php', 'direct', 6],
            ['sess_demo_01', '/pages/shop.php', 'direct', 6],
            ['sess_demo_02', '/index.php', 'google', 5],
            ['sess_demo_02', '/pages/product-detail.php?slug=chicco-pram', 'google', 5],
            ['sess_demo_03', '/pages/shop.php', 'facebook', 4],
            ['sess_demo_04', '/index.php', 'direct', 3],
            ['sess_demo_04', '/pages/cart.php', 'direct', 3],
            ['sess_demo_05', '/pages/about.php', 'referral', 2],
            ['sess_demo_02', '/pages/shop.php?category=breast-pumps', 'google', 1],
            ['sess_demo_03', '/index.php', 'facebook', 1],
            ['sess_demo_01', '/pages/how-it-works.php', 'direct', 1],
        ];

        $stmt = getPdo()->prepare(
            'INSERT INTO page_views (session_id, page_path, referrer_source, created_at)
             VALUES (?, ?, ?, DATE_SUB(NOW(), INTERVAL ? DAY))'
        );

        foreach ($rows as $row) {
            $stmt->execute([$row[0], $row[1], $row[2], $row[3]]);
        }

        return true;
    } catch (Throwable $e) {
        return false;
    }
}

function getTrafficStats($days = 7)
{
    ensurePageViewsTable();
    seedDemoTrafficIfEmpty();

    $pdo = getPdo();
    $window = max(1, (int) $days);

    $pageViews = (int) $pdo->query(
        "SELECT COUNT(*) FROM page_views WHERE created_at >= DATE_SUB(NOW(), INTERVAL $window DAY)"
    )->fetchColumn();

    $uniqueVisitors = (int) $pdo->query(
        "SELECT COUNT(DISTINCT session_id) FROM page_views WHERE created_at >= DATE_SUB(NOW(), INTERVAL $window DAY)"
    )->fetchColumn();

    $topPages = $pdo->query(
        "SELECT page_path, COUNT(*) AS views
         FROM page_views
         WHERE created_at >= DATE_SUB(NOW(), INTERVAL $window DAY)
         GROUP BY page_path
         ORDER BY views DESC, page_path ASC
         LIMIT 5"
    )->fetchAll();

    $trafficSources = $pdo->query(
        "SELECT referrer_source, COUNT(*) AS visits
         FROM page_views
         WHERE created_at >= DATE_SUB(NOW(), INTERVAL $window DAY)
         GROUP BY referrer_source
         ORDER BY visits DESC, referrer_source ASC"
    )->fetchAll();

    $dailyTrend = $pdo->query(
        "SELECT DATE(created_at) AS day, COUNT(*) AS views
         FROM page_views
         WHERE created_at >= DATE_SUB(NOW(), INTERVAL $window DAY)
         GROUP BY DATE(created_at)
         ORDER BY day ASC"
    )->fetchAll();

    $hasDemoSeed = (int) $pdo->query(
        "SELECT COUNT(*) FROM page_views WHERE session_id LIKE 'sess_demo_%'"
    )->fetchColumn() > 0;

    $completedOrders = (int) $pdo->query(
        "SELECT COUNT(*) FROM orders WHERE status IN ('paid', 'completed')"
    )->fetchColumn();

    return [
        'days' => $window,
        'page_views' => $pageViews,
        'unique_visitors' => $uniqueVisitors,
        'sessions' => $uniqueVisitors,
        'top_pages' => $topPages,
        'traffic_sources' => $trafficSources,
        'daily_trend' => $dailyTrend,
        'completed_orders' => $completedOrders,
        'has_demo_seed' => $hasDemoSeed,
    ];
}

function formatAnalyticsPageLabel($path)
{
    $path = (string) $path;

    if ($path === '/index.php' || $path === 'index.php') {
        return 'Home';
    }

    if (str_contains($path, 'product-detail')) {
        return 'Product detail';
    }

    if (str_contains($path, 'shop.php')) {
        return 'Shop';
    }

    if (str_contains($path, 'cart.php')) {
        return 'Cart';
    }

    if (str_contains($path, 'checkout')) {
        return 'Checkout';
    }

    return basename(strtok($path, '?')) ?: $path;
}

function formatTrafficSourceLabel($source)
{
    $labels = [
        'direct' => 'Direct',
        'google' => 'Google',
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'referral' => 'Referral',
    ];

    return $labels[$source] ?? ucfirst($source);
}
