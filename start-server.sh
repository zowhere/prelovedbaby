#!/usr/bin/env bash
set -e
cd "$(dirname "$0")"
PORT="${PORT:-8081}"
HOST="127.0.0.1"

if ! command -v php >/dev/null 2>&1; then
  echo "PHP is not installed. Install PHP (e.g. brew install php) and try again."
  exit 1
fi

echo "PreLoved Baby dev server"
echo "  URL:  http://${HOST}:${PORT}/"
echo "  Root: $(pwd)"
echo "  Stop: Ctrl+C"
echo ""
echo "First time? Open http://${HOST}:${PORT}/setup-database.php after MySQL is running."
echo ""

exec php -S "${HOST}:${PORT}" -t .
