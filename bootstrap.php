<?php

define('APP_ROOT', __DIR__);
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? APP_ROOT) ?: APP_ROOT);
$appRoot = str_replace('\\', '/', realpath(APP_ROOT) ?: APP_ROOT);
$siteBase = '/';
if (str_starts_with($appRoot, $docRoot)) {
    $relative = substr($appRoot, strlen($docRoot));
    if ($relative !== '' && $relative !== '/') {
        $siteBase = rtrim($relative, '/') . '/';
    }
}
