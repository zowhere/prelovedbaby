<?php

function getDbConfig()
{
    static $config;

    if ($config === null) {
        $path = __DIR__ . '/config.php';
        if (!is_file($path)) {
            throw new RuntimeException('Copy includes/config.example.php to includes/config.php first.');
        }
        $config = require $path;
    }

    return $config;
}

function getPdo()
{
    static $pdo;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $c = getDbConfig();
    $pdo = new PDO(
        sprintf('mysql:host=%s;dbname=%s;charset=%s', $c['db_host'], $c['db_name'], $c['db_charset']),
        $c['db_user'],
        $c['db_pass'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    return $pdo;
}
