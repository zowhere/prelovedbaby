<?php

require_once APP_ROOT . '/lib/auth.php';

logoutUser();
header('Location: index.php');
exit;
