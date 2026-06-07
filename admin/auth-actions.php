<?php

require_once __DIR__ . '/../includes/auth.php';

$action = $_POST['action'] ?? '';

if ($action === 'logout') {
    logoutUser();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $action !== 'login') {
    header('Location: login.php');
    exit;
}

try {
    $error = attemptLogin($_POST['email'] ?? '', $_POST['password'] ?? '');

    if ($error) {
        header('Location: login.php?error=' . urlencode($error));
        exit;
    }

    require_once __DIR__ . '/../includes/rbac.php';

    if (!can('dashboard.view')) {
        logoutUser();
        header('Location: login.php?error=' . urlencode('Your account does not have admin access.'));
        exit;
    }

    header('Location: index.php');
    exit;
} catch (Throwable $e) {
    header('Location: login.php?error=' . urlencode('Database error. Run setup-database.php first.'));
    exit;
}
