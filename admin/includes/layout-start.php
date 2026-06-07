<?php
/** @var string $adminPageTitle */
/** @var string $adminPageHeading */
/** @var string|null $adminPageSubtitle */
/** @var string $adminActiveNav */

require_once __DIR__ . '/../../includes/rbac.php';
requireAdminAccess();

$adminUser = getCurrentUser();
$adminPageTitle = $adminPageTitle ?? 'Admin';
$adminPageHeading = $adminPageHeading ?? 'Dashboard';
$adminPageSubtitle = $adminPageSubtitle ?? '';
$adminActiveNav = $adminActiveNav ?? '';
$adminFlashError = $_GET['error'] ?? '';
$adminFlashSuccess = $_GET['success'] ?? '';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($adminPageTitle) ?> | PreLoved Baby Admin</title>
  <link rel="icon" href="../assets/images/favicon.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.min.css">
  <link href="../assets/sass/style.css" rel="stylesheet">
  <link href="../assets/css/admin.css" rel="stylesheet">
</head>
<body class="admin-body">
  <div class="admin-shell">
    <?php include __DIR__ . '/sidebar.php'; ?>
    <div class="admin-main">
      <h1 class="admin-page-title"><?= htmlspecialchars($adminPageHeading) ?></h1>
      <?php if ($adminPageSubtitle !== '') : ?>
      <p class="text-body-secondary mb-4"><?= htmlspecialchars($adminPageSubtitle) ?></p>
      <?php endif; ?>
      <?php if ($adminFlashError !== '') : ?>
      <div class="alert alert-danger"><?= htmlspecialchars($adminFlashError) ?></div>
      <?php endif; ?>
      <?php if ($adminFlashSuccess !== '') : ?>
      <div class="alert alert-success"><?= htmlspecialchars($adminFlashSuccess) ?></div>
      <?php endif; ?>
