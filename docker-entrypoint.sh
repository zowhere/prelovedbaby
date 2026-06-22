#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

if [[ ! -f config/config.php ]]; then
  cp config/config.example.php config/config.php
fi

echo "Waiting for MySQL..."
until php -r '
$c = require "config/config.php";
new PDO(
    sprintf("mysql:host=%s;dbname=%s;charset=%s", $c["db_host"], $c["db_name"], $c["db_charset"]),
    $c["db_user"],
    $c["db_pass"],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
' >/dev/null 2>&1; do
  sleep 2
done

needs_setup="$(php -r '
$c = require "config/config.php";
try {
    $pdo = new PDO(
        sprintf("mysql:host=%s;dbname=%s;charset=%s", $c["db_host"], $c["db_name"], $c["db_charset"]),
        $c["db_user"],
        $c["db_pass"]
    );
    echo (int) $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn() === 0 ? "1" : "0";
} catch (Throwable $e) {
    echo "1";
}
')"

if [[ "$needs_setup" == "1" ]]; then
  echo "Seeding database (first run only)..."
  php setup-database.php >/dev/null
  echo "Database ready."
fi

exec "$@"
