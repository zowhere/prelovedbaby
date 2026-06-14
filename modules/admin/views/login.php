<?php
require_once APP_ROOT . '/lib/auth.php';

$error = $_GET['error'] ?? '';

if (isLoggedIn()) {
    require_once APP_ROOT . '/lib/rbac.php';
    if (can('dashboard.view')) {
        header('Location: index.php');
        exit;
    }
    logoutUser();
    $error = 'Your account does not have admin access.';
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login | PreLoved Baby</title>
  <link rel="icon" href="../images/favicon.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap-icons.min.css">
  <link href="../css/sass/style.css" rel="stylesheet">
  <link href="../css/admin.css" rel="stylesheet">
</head>
<body class="admin-body">
  <div class="admin-login-wrap">
    <div class="admin-login-card">
      <div class="card-body p-4 p-md-5">
        <div class="mb-4">
          <div class="admin-brand-title">PreLoved Baby</div>
          <div class="admin-brand-sub">Admin sign in</div>
        </div>
        <?php if ($error !== '') : ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form action="auth-actions.php" method="post">
          <input type="hidden" name="action" value="login">
          <div class="mb-3">
            <label for="adminEmail" class="form-label">Email</label>
            <input type="email" class="form-control border" id="adminEmail" name="email" placeholder="admin@prelovedbaby.co.za" required>
          </div>
          <div class="mb-4">
            <label for="adminPassword" class="form-label">Password</label>
            <input type="password" class="form-control border" id="adminPassword" name="password" placeholder="Enter password" required>
          </div>
          <button type="submit" class="btn btn-dark w-100">Sign in to dashboard</button>
        </form>
        <div class="text-center mt-4">
          <a href="../index.php" class="text-decoration-none font-14">Back to marketplace</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
