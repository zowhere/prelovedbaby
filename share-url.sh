#!/usr/bin/env bash
set -euo pipefail

cd "$(dirname "$0")"

if ! docker compose ps tunnel --status running >/dev/null 2>&1; then
  echo "Starting public tunnel..."
  docker compose --profile share up -d tunnel
  sleep 4
fi

url="$(docker compose logs tunnel 2>&1 | grep -oE 'https://[a-z0-9-]+\.trycloudflare\.com' | tail -1)"

if [[ -z "$url" ]]; then
  echo "Tunnel is starting. Run this again in a few seconds:"
  echo "  ./share-url.sh"
  docker compose logs tunnel --tail 10
  exit 1
fi

echo ""
echo "Share this link with friends:"
echo "  $url"
echo ""
echo "Demo logins are in README.md (admin / seller accounts)."
echo "Stop sharing: docker compose --profile share down"
