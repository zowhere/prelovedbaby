<?php
require_once dirname(__DIR__, 2) . '/bootstrap.php';
require_once APP_ROOT . '/lib/auth.php';

logoutUser();
header('Location: ' . $siteBase . 'index.php');
exit;
