#!/usr/bin/env bash
#
# Regal Solution — production deploy preparation.
# Builds production assets, strips dev dependencies, and packages a clean
# deploy archive for the ExonHost cPanel target (docroot /public_html).
#
# Usage:  bash deploy.sh
# Output: storage/deploy/regal-website-deploy-<timestamp>.zip
#
set -euo pipefail

APP_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$APP_ROOT"

STAMP="$(date +%Y%m%d-%H%M%S)"
OUT_DIR="$APP_ROOT/storage/deploy"
OUT_ZIP="$OUT_DIR/regal-website-deploy-$STAMP.zip"
mkdir -p "$OUT_DIR"

echo "▸ 1/4  Installing production dependencies (--no-dev)…"
composer install --no-dev --optimize-autoloader --no-interaction

echo "▸ 2/4  Building frontend assets…"
npm run build

echo "▸ 3/4  Packaging deploy archive…"
# Exclude: dev/runtime files and the local .env (secrets).
zip -r -q "$OUT_ZIP" . \
    -x ".git/*" \
    -x ".env" \
    -x ".env.production.example" \
    -x "node_modules/*" \
    -x "storage/deploy/*" \
    -x "storage/logs/*" \
    -x "storage/framework/cache/*" \
    -x "storage/framework/sessions/*" \
    -x "storage/framework/views/*" \
    -x "tests/*" \
    -x "phpunit.xml" \
    -x "*.log"

echo "▸ 4/4  Done."
echo ""
echo "Deploy archive: $OUT_ZIP"
echo ""
echo "Next steps (cPanel / ExonHost):"
echo "  1. BACK UP the current live site (files + DB) first."
echo "  2. Upload the archive + extract under the app core dir."
echo "  3. Copy .env.production.example → .env and fill APP_KEY/DB/MAIL/secrets."
echo "  4. Run:  php artisan migrate --force && php artisan db:seed --force"
echo "  5. Link storage:  php artisan storage:link"
echo "  6. Point docroot to /public_html (see DEPLOY_CHECKPOINT_2026-04-05.md + docs/CPANEL_DEPLOY.md)."
echo "  7. Verify https://regal-solution.com and /admin."
