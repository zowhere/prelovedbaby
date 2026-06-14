<?php

require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/rbac.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: users.php');
    exit;
}

$action = $_POST['action'] ?? '';
$redirect = 'users.php';

try {
    if ($action === 'create') {
        requirePermission('users.create');

        $name = trim($_POST['name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';
        $roleId = (int) ($_POST['role_id'] ?? 5);
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        if ($name === '' || $email === '' || $password === '') {
            header('Location: user-form.php?error=' . urlencode('Please fill in all required fields.'));
            exit;
        }
        if (strlen($password) < 8) {
            header('Location: user-form.php?error=' . urlencode('Password must be at least 8 characters.'));
            exit;
        }
        if (findUserByEmail($email)) {
            header('Location: user-form.php?error=' . urlencode('Email already in use.'));
            exit;
        }

        getPdo()->prepare('INSERT INTO users (name, email, password_hash, role_id, is_active) VALUES (?, ?, ?, ?, ?)')
            ->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $roleId, $isActive]);

        header('Location: ' . $redirect . '?success=' . urlencode('User created successfully.'));
        exit;
    }

    if ($action === 'update') {
        requirePermission('users.edit');

        $userId = (int) ($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';
        $roleId = (int) ($_POST['role_id'] ?? 5);
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        if ($userId <= 0 || $name === '' || $email === '') {
            header('Location: users.php?error=' . urlencode('Invalid user data.'));
            exit;
        }

        $existing = findUserByEmail($email);
        if ($existing && (int) $existing['id'] !== $userId) {
            header('Location: user-form.php?id=' . $userId . '&error=' . urlencode('Email already in use.'));
            exit;
        }

        if ($password !== '') {
            if (strlen($password) < 8) {
                header('Location: user-form.php?id=' . $userId . '&error=' . urlencode('Password must be at least 8 characters.'));
                exit;
            }
            getPdo()->prepare('UPDATE users SET name = ?, email = ?, password_hash = ?, role_id = ?, is_active = ? WHERE id = ?')
                ->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $roleId, $isActive, $userId]);
        } else {
            getPdo()->prepare('UPDATE users SET name = ?, email = ?, role_id = ?, is_active = ? WHERE id = ?')
                ->execute([$name, $email, $roleId, $isActive, $userId]);
        }

        if ($userId === (int) ($_SESSION['user_id'] ?? 0)) {
            loginUser($userId);
        }

        header('Location: ' . $redirect . '?success=' . urlencode('User updated successfully.'));
        exit;
    }

    if ($action === 'delete') {
        requirePermission('users.delete');

        $userId = (int) ($_POST['id'] ?? 0);

        if ($userId <= 0 || $userId === (int) ($_SESSION['user_id'] ?? 0)) {
            header('Location: users.php?error=' . urlencode('You cannot delete this user.'));
            exit;
        }

        getPdo()->prepare('DELETE FROM users WHERE id = ?')->execute([$userId]);
        header('Location: ' . $redirect . '?success=' . urlencode('User deleted.'));
        exit;
    }
} catch (Throwable $e) {
    header('Location: users.php?error=' . urlencode('Action failed. Check database setup.'));
    exit;
}

header('Location: users.php');
exit;
