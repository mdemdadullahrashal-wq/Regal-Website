# Regal Solution Website

Laravel-based bilingual (EN/BN) marketing website with:
- Public pages: Home, About, Services, Career, Contact, Privacy, Terms
- Contact and Career submission forms
- Filament Admin Panel for editing Services and Pages
- cPanel deployment-ready configuration

## Tech Stack
- Laravel 12
- Filament 5
- SQLite/MySQL (MySQL recommended for production)

## Local Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Optional frontend build:
```bash
npm install
npm run build
```

## Admin Panel
- URL: `/admin`
- Default credentials from `.env`:
  - `ADMIN_EMAIL`
  - `ADMIN_PASSWORD`

After first login, change admin password immediately.

## Logo Setup
1. Put your final logo file into `public/images/` (example: `public/images/regal-logo.png`).
2. Set `.env` value:
   - `REGAL_LOGO_PATH=images/regal-logo.png`
3. Run:
```bash
php artisan optimize:clear
```

## cPanel Deployment
Read full guide at:
- `docs/CPANEL_DEPLOY.md`

Quick command after deploy:
```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force --seed
php artisan optimize
composer run deploy:cpanel
```

## Environment Notes
If Filament install fails on a fresh machine, ensure these PHP extensions are enabled:
- `intl`
- `zip`
