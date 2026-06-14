<?php

require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/rbac.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? 'pages/account/profile.php';

if (!str_starts_with($redirect, 'pages/') || str_contains($redirect, '..') || str_contains($redirect, '//')) {
    $redirect = 'pages/account/profile.php';
}

if ($action === 'logout') {
    logoutUser();
    header('Location: ' . $siteBase . 'index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $siteBase . 'pages/auth/login.php');
    exit;
}

try {
    if ($action === 'register') {
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        if ($password !== $passwordConfirm) {
            header('Location: ' . $siteBase . 'pages/auth/register.php?error=' . urlencode('Passwords do not match.'));
            exit;
        }

        $error = registerUser(
            $_POST['name'] ?? '',
            $_POST['email'] ?? '',
            $password
        );

        if ($error) {
            header('Location: ' . $siteBase . 'pages/auth/register.php?error=' . urlencode($error));
            exit;
        }

        header('Location: ' . $siteBase . 'pages/account/profile.php');
        exit;
    }

    if ($action === 'register_seller') {
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        if ($password !== $passwordConfirm) {
            header('Location: ' . $siteBase . 'pages/auth/register-seller.php?error=' . urlencode('Passwords do not match.'));
            exit;
        }

        $error = registerSeller(
            $_POST['name'] ?? '',
            $_POST['email'] ?? '',
            $password
        );

        if ($error) {
            header('Location: ' . $siteBase . 'pages/auth/register-seller.php?error=' . urlencode($error));
            exit;
        }

        header('Location: ' . $siteBase . 'pages/account/profile.php?registered=seller');
        exit;
    }

    if ($action === 'login') {
        $error = attemptLogin(
            $_POST['email'] ?? '',
            $_POST['password'] ?? ''
        );

        if ($error) {
            header('Location: ' . $siteBase . 'pages/auth/login.php?error=' . urlencode($error));
            exit;
        }

        if (can('dashboard.view')) {
            header('Location: ' . $siteBase . 'admin/index.php');
            exit;
        }

        header('Location: ' . $siteBase . ltrim($redirect, '/'));
        exit;
    }

    if ($action === 'update_profile') {
        if (!isLoggedIn()) {
            header('Location: ' . $siteBase . 'pages/auth/login.php');
            exit;
        }

        $error = updateUserProfile(
            getCurrentUser()['id'],
            $_POST['first_name'] ?? '',
            $_POST['last_name'] ?? '',
            $_POST['country'] ?? ''
        );

        if ($error) {
            header('Location: ' . $siteBase . 'pages/account/profile.php?error=' . urlencode($error));
            exit;
        }

        header('Location: ' . $siteBase . 'pages/account/profile.php?success=' . urlencode('Your profile has been updated.'));
        exit;
    }
} catch (Throwable $e) {
    $message = 'Database error. Run setup-database.php first.';
    $page = in_array($action, ['register', 'register_seller'], true)
        ? 'pages/auth/' . ($action === 'register_seller' ? 'register-seller' : 'register') . '.php'
        : ($action === 'update_profile' ? 'pages/account/profile.php' : 'pages/auth/login.php');
    header('Location: ' . $siteBase . $page . '?error=' . urlencode($message));
    exit;
}

header('Location: ' . $siteBase . 'pages/auth/login.php');
exit;
