<?php

require_once APP_ROOT . '/lib/auth.php';

logoutUser();
header('Location: login.php');
exit;
