<?php

require_once APP_ROOT . '/lib/auth.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$redirect = basename($_POST['redirect'] ?? $_GET['redirect'] ?? 'account-my-profile.php');

if ($action === 'logout') {
    logoutUser();
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: auth-login.php');
    exit;
}

try {
    if ($action === 'register') {
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        if ($password !== $passwordConfirm) {
            header('Location: auth-register.php?error=' . urlencode('Passwords do not match.'));
            exit;
        }

        $error = registerUser(
            $_POST['name'] ?? '',
            $_POST['email'] ?? '',
            $password
        );

        if ($error) {
            header('Location: auth-register.php?error=' . urlencode($error));
            exit;
        }

        header('Location: account-my-profile.php');
        exit;
    }

    if ($action === 'login') {
        $error = attemptLogin(
            $_POST['email'] ?? '',
            $_POST['password'] ?? ''
        );

        if ($error) {
            header('Location: auth-login.php?error=' . urlencode($error));
            exit;
        }

        header('Location: ' . $redirect);
        exit;
    }
} catch (Throwable $e) {
    $message = 'Database error. Run setup-database.php first.';
    $page = $action === 'register' ? 'auth-register.php' : 'auth-login.php';
    header('Location: ' . $page . '?error=' . urlencode($message));
    exit;
}

header('Location: auth-login.php');
exit;
