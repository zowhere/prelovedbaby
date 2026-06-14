<?php

require_once __DIR__ . '/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function findUserByEmail($email)
{
    $stmt = getPdo()->prepare(
        'SELECT u.id, u.name, u.email, u.password_hash, u.role_id, u.is_active, r.slug AS role_slug, r.name AS role_name
         FROM users u
         JOIN roles r ON r.id = u.role_id
         WHERE u.email = ? LIMIT 1'
    );
    $stmt->execute([strtolower(trim($email))]);
    return $stmt->fetch() ?: null;
}

function findUserById($id)
{
    $stmt = getPdo()->prepare(
        'SELECT u.id, u.name, u.email, u.role_id, u.is_active, u.created_at, r.slug AS role_slug, r.name AS role_name
         FROM users u
         JOIN roles r ON r.id = u.role_id
         WHERE u.id = ? LIMIT 1'
    );
    $stmt->execute([(int) $id]);
    return $stmt->fetch() ?: null;
}

function registerUser($name, $email, $password)
{
    $name = trim($name);
    $email = strtolower(trim($email));

    if ($name === '' || $email === '' || $password === '') {
        return 'Please fill in all fields.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Please enter a valid email address.';
    }
    if (strlen($password) < 8) {
        return 'Password must be at least 8 characters.';
    }
    if (findUserByEmail($email)) {
        return 'An account with that email already exists.';
    }

    $customerRole = getPdo()->query("SELECT id FROM roles WHERE slug = 'customer' LIMIT 1")->fetchColumn();

    getPdo()->prepare('INSERT INTO users (name, email, password_hash, role_id) VALUES (?, ?, ?, ?)')
        ->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), (int) $customerRole]);

    loginUser((int) getPdo()->lastInsertId());
    return null;
}

function attemptLogin($email, $password)
{
    $email = strtolower(trim($email));

    if ($email === '' || $password === '') {
        return 'Please enter your email and password.';
    }

    $user = findUserByEmail($email);
    if (!$user || !password_verify($password, $user['password_hash'])) {
        return 'Incorrect email or password.';
    }

    if (!(int) $user['is_active']) {
        return 'This account has been deactivated. Contact an administrator.';
    }

    loginUser((int) $user['id']);
    return null;
}

function loginUser($userId)
{
    $user = findUserById($userId);
    if (!$user) {
        return;
    }

    $_SESSION['user_id'] = (int) $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role_id'] = (int) $user['role_id'];
    $_SESSION['user_role_slug'] = $user['role_slug'];
    $_SESSION['user_role_name'] = $user['role_name'];

    require_once __DIR__ . '/rbac.php';
    refreshSessionPermissions();
}

function logoutUser()
{
    unset(
        $_SESSION['user_id'],
        $_SESSION['user_name'],
        $_SESSION['user_email'],
        $_SESSION['user_role_id'],
        $_SESSION['user_role_slug'],
        $_SESSION['user_role_name'],
        $_SESSION['permissions']
    );
}

function isLoggedIn()
{
    return !empty($_SESSION['user_id']);
}

function getCurrentUser()
{
    if (!isLoggedIn()) {
        return null;
    }

    return [
        'id' => (int) $_SESSION['user_id'],
        'name' => $_SESSION['user_name'] ?? '',
        'email' => $_SESSION['user_email'] ?? '',
        'role_id' => (int) ($_SESSION['user_role_id'] ?? 0),
        'role_slug' => $_SESSION['user_role_slug'] ?? '',
        'role_name' => $_SESSION['user_role_name'] ?? '',
    ];
}

function requireLogin($redirect = 'auth-login.php')
{
    if (!isLoggedIn()) {
        header('Location: ' . $redirect);
        exit;
    }
}
