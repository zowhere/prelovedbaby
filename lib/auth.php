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
        'SELECT u.id, u.name, u.email, u.country, u.role_id, u.is_active, u.created_at, r.slug AS role_slug, r.name AS role_name
         FROM users u
         JOIN roles r ON r.id = u.role_id
         WHERE u.id = ? LIMIT 1'
    );
    $stmt->execute([(int) $id]);
    return $stmt->fetch() ?: null;
}

function getRoleIdBySlug($slug)
{
    $stmt = getPdo()->prepare('SELECT id FROM roles WHERE slug = ? LIMIT 1');
    $stmt->execute([$slug]);
    $roleId = $stmt->fetchColumn();

    return $roleId ? (int) $roleId : null;
}

function validateRegistrationFields($name, $email, $password)
{
    $name = trim($name);
    $email = strtolower(trim($email));

    if ($name === '' || $email === '' || $password === '') {
        return ['error' => 'Please fill in all fields.', 'name' => $name, 'email' => $email];
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['error' => 'Please enter a valid email address.', 'name' => $name, 'email' => $email];
    }
    if (strlen($password) < 8) {
        return ['error' => 'Password must be at least 8 characters.', 'name' => $name, 'email' => $email];
    }
    if (findUserByEmail($email)) {
        return ['error' => 'An account with that email already exists.', 'name' => $name, 'email' => $email];
    }

    return ['error' => null, 'name' => $name, 'email' => $email];
}

function createUserAccount($name, $email, $password, $roleSlug)
{
    $validated = validateRegistrationFields($name, $email, $password);
    if ($validated['error']) {
        return $validated['error'];
    }

    $roleId = getRoleIdBySlug($roleSlug);
    if (!$roleId) {
        return 'Registration is unavailable. Run setup-database.php first.';
    }

    getPdo()->prepare('INSERT INTO users (name, email, password_hash, role_id) VALUES (?, ?, ?, ?)')
        ->execute([$validated['name'], $validated['email'], password_hash($password, PASSWORD_DEFAULT), $roleId]);

    loginUser((int) getPdo()->lastInsertId());
    return null;
}

function registerUser($name, $email, $password)
{
    return createUserAccount($name, $email, $password, 'customer');
}

function registerSeller($name, $email, $password)
{
    return createUserAccount($name, $email, $password, 'seller');
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

function getSiteBase()
{
    if (!defined('APP_ROOT')) {
        return '/';
    }

    $docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? APP_ROOT) ?: APP_ROOT);
    $appRoot = str_replace('\\', '/', realpath(APP_ROOT) ?: APP_ROOT);
    $siteBase = '/';
    if (str_starts_with($appRoot, $docRoot)) {
        $relative = substr($appRoot, strlen($docRoot));
        if ($relative !== '' && $relative !== '/') {
            $siteBase = rtrim($relative, '/') . '/';
        }
    }

    return $siteBase;
}

function requireLogin($redirect = null)
{
    if (!isLoggedIn()) {
        header('Location: ' . ($redirect ?? getSiteBase() . 'pages/auth/login.php'));
        exit;
    }
}

function getProfileCountries()
{
    return ['South Africa', 'Namibia', 'Botswana', 'Zimbabwe'];
}

function updateUserProfile($userId, $firstName, $lastName, $country)
{
    $firstName = trim($firstName);
    $lastName = trim($lastName);
    $country = trim($country);

    if ($firstName === '') {
        return 'Please enter your first name.';
    }
    if ($country === '' || !in_array($country, getProfileCountries(), true)) {
        return 'Please select a valid country.';
    }

    $name = $lastName !== '' ? $firstName . ' ' . $lastName : $firstName;

    getPdo()->prepare('UPDATE users SET name = ?, country = ? WHERE id = ?')
        ->execute([$name, $country, (int) $userId]);

    loginUser((int) $userId);
    return null;
}
