<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<?php

require_once APP_ROOT . '/lib/auth.php';
require_once APP_ROOT . '/lib/rbac.php';
require_once APP_ROOT . '/lib/categories.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: categories.php');
    exit;
}

$action = $_POST['action'] ?? '';
$redirect = 'categories.php';

try {
    if ($action === 'create') {
        requirePermission('products.create');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');

        createCategory($name, $slug !== '' ? $slug : null);
        header('Location: categories.php?success=' . urlencode('Category added.'));
        exit;
    }

    if ($action === 'update') {
        requirePermission('products.edit');

        $id = (int) ($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');

        if ($id <= 0) {
            header('Location: category-form.php?error=' . urlencode('Invalid category.'));
            exit;
        }

        updateCategory($id, $name, $slug !== '' ? $slug : null);
        header('Location: categories.php?success=' . urlencode('Category updated.'));
        exit;
    }

    if ($action === 'delete') {
        requirePermission('products.delete');

        $id = (int) ($_POST['id'] ?? 0);
        if ($id <= 0) {
            header('Location: categories.php?error=' . urlencode('Invalid category.'));
            exit;
        }

        $result = deleteCategory($id);
        $param = $result['ok'] ? 'success' : 'error';
        header('Location: categories.php?' . $param . '=' . urlencode($result['message']));
        exit;
    }

    header('Location: categories.php?error=' . urlencode('Unknown action.'));
    exit;
} catch (InvalidArgumentException $e) {
    $formRedirect = in_array($action, ['create', 'update'], true) ? 'category-form.php' : $redirect;
    $query = 'error=' . urlencode($e->getMessage());

    if ($action === 'update') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            $formRedirect .= '?id=' . $id . '&' . $query;
        } else {
            $formRedirect .= '?' . $query;
        }
    } else {
        $formRedirect .= '?' . $query;
    }

    header('Location: ' . $formRedirect);
    exit;
}
