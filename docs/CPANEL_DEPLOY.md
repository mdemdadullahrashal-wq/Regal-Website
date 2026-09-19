# cPanel Deployment Guide (Laravel)

## 1) Server Requirements
- PHP 8.2+
- Extensions: `intl`, `zip`, `mbstring`, `openssl`, `pdo_mysql`, `fileinfo`, `tokenizer`, `xml`
- Composer available on server (or deploy `vendor` folder from local)

## 2) Folder Strategy
- Preferred: point domain document root to `public` folder.
- If not possible: use a subdomain/addon-domain that supports custom document root.

## 3) Environment Setup
- Copy `.env.example` to `.env`
- Set `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://your-domain.com`
- Set MySQL values (`DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)
- Set mail credentials and `MAIL_FROM_ADDRESS`
- Set Regal variables (`REGAL_*`) and admin credentials (`ADMIN_*`)

## 4) Install & Build
```bash
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan optimize
```

If Node is available on server:
```bash
npm install
npm run build
```

If Node is not available:
- Build locally (`npm run build`) and upload `public/build`.

## 5) File Permissions
- Ensure `storage` and `bootstrap/cache` are writable.

## 6) Security
- Keep `APP_DEBUG=false`
- Change default admin password immediately after first login.

## 7) Admin Access
- URL: `/admin`
- Login with `ADMIN_EMAIL` / `ADMIN_PASSWORD` from `.env`
