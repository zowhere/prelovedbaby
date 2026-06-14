<?php

define('APP_ROOT', __DIR__);

// Absolute web path to app root (trailing slash). Resolves nav/assets from any entry stub.
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
$siteBase = ($scriptDir === '/' || $scriptDir === '') ? '/' : $scriptDir . '/';
