<?php

require_once __DIR__ . '/auth.php';

function loadUserPermissions($userId)
{
    $stmt = getPdo()->prepare(
        'SELECT p.slug
         FROM users u
         JOIN role_permissions rp ON rp.role_id = u.role_id
         JOIN permissions p ON p.id = rp.permission_id
         WHERE u.id = ? AND u.is_active = 1'
    );
    $stmt->execute([(int) $userId]);

    return array_column($stmt->fetchAll(), 'slug');
}

function refreshSessionPermissions()
{
    if (!isLoggedIn()) {
        $_SESSION['permissions'] = [];
        return;
    }

    $_SESSION['permissions'] = loadUserPermissions((int) $_SESSION['user_id']);
}

function can($permission)
{
    if (!isLoggedIn()) {
        return false;
    }

    if (!isset($_SESSION['permissions'])) {
        refreshSessionPermissions();
    }

    return in_array($permission, $_SESSION['permissions'] ?? [], true);
}

function requirePermission($permission, $redirect = 'index.php')
{
    if (!can($permission)) {
        header('Location: ' . $redirect . '?error=' . urlencode('You do not have permission to access that page.'));
        exit;
    }
}

function requireAdminAccess($redirect = 'login.php')
{
    if (!isLoggedIn()) {
        header('Location: ' . $redirect);
        exit;
    }

    if (!can('dashboard.view')) {
        header('Location: ' . $redirect . '?error=' . urlencode('Your account does not have admin access.'));
        exit;
    }
}

function getAllRoles()
{
    return getPdo()->query('SELECT id, name, slug, description FROM roles ORDER BY id')->fetchAll();
}

function getRoleById($id)
{
    $stmt = getPdo()->prepare('SELECT id, name, slug, description FROM roles WHERE id = ? LIMIT 1');
    $stmt->execute([(int) $id]);
    return $stmt->fetch() ?: null;
}

function getRolePermissions($roleId)
{
    $stmt = getPdo()->prepare(
        'SELECT p.slug, p.name, p.module
         FROM role_permissions rp
         JOIN permissions p ON p.id = rp.permission_id
         WHERE rp.role_id = ?
         ORDER BY p.module, p.name'
    );
    $stmt->execute([(int) $roleId]);
    return $stmt->fetchAll();
}

function getAllPermissionsGrouped()
{
    $rows = getPdo()->query('SELECT id, name, slug, module FROM permissions ORDER BY module, name')->fetchAll();
    $grouped = [];

    foreach ($rows as $row) {
        $grouped[$row['module']][] = $row;
    }

    return $grouped;
}

function isAdminRole($roleSlug)
{
    return in_array($roleSlug, ['super_admin', 'admin', 'manager', 'support'], true);
}

function formatAdminPrice($amount)
{
    return 'R ' . number_format((float) $amount, 0, '.', ',');
}

function adminStatusBadge($status)
{
    return '<span class="badge admin-status-badge">' . htmlspecialchars(ucfirst($status)) . '</span>';
}
