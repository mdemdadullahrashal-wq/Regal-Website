# Regal Solution Website

Bilingual (EN/BN, Bangla default) Laravel marketing website for Regal Solution's SaaS products.

## Features
- **Locale-prefixed routing:** `/bn` (default, `/` → 301 `/bn`) + `/en`, hreflang + canonical, language switcher.
- **8 products** (6 SaaS + 2 services) with landing pages: hero → highlights slider → features → pricing → FAQ → related.
  - SaaS: School, Apartment, Sales CRM, Mosque, POS, Bus Ticket
  - Services: E-commerce website, Custom software
- **Full-width hero carousel** on the home page (one slide per product) with per-product SVG icons.
- **Career screening form** (full-width) with conditional yes/no questions + photo upload.
- **Lead capture** (popup + floating button) → CRM / SMS (env-driven).
- **Blog** (bn/en), **global search**, **WhatsApp + call floating buttons**.
- **SEO/AI:** JSON-LD (Organization, SoftwareApplication/Product, FAQPage, BreadcrumbList), `sitemap.xml`, `robots.txt`, `llms.txt`.
- **Filament admin panel** — edit Pages/Services, view Job Applications.

## Tech Stack
- Laravel 12
- Filament 5
- MySQL (production) / SQLite (optional local)
- Vite

## Local Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Frontend build (after CSS/JS changes):
```bash
npm install
npm run build
```

## Admin Panel
- URL: `/admin`
- Default from `.env`: `ADMIN_EMAIL` / `ADMIN_PASSWORD` (change after first login).
- Job applications appear under **Leads → Job Applications**.

## Key Commands (after code changes)
```bash
npm run build            # rebuild Vite assets (required for CSS/JS edits)
php artisan migrate --force
php artisan db:seed --class=ProductSeeder --force
php artisan optimize:clear
php artisan storage:link  # once, for photo/CV uploads
```

## Environment Notes
- `REGAL_PHONE`, `REGAL_PHONES`, `REGAL_EMAIL`, `REGAL_WHATSAPP_LINK`, `REGAL_OFFICE_ADDRESS` — contact details.
- `CRM_LEADS_API_URL/TOKEN`, `BULKSMSBD_*`, `NOTIFY_PHONE` — lead → CRM/SMS (skip+log when unconfigured).
- `MAIL_MAILER` defaults to `log` — set real SMTP for email notifications.
- Ensure PHP extensions: `intl`, `zip`, `mbstring`, `fileinfo`, `pdo_mysql`.

## cPanel Deployment
Read full guide at:
- `docs/CPANEL_DEPLOY.md`
- `DEPLOY_CHECKPOINT_2026-04-05.md` (architecture + gotchas)

Quick command after deploy:
```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force --seed
php artisan optimize
```
