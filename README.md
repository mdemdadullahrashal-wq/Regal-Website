# Regal Solution Website

Bilingual (EN/BN, Bangla default) Laravel marketing website for Regal Solution's SaaS products.
**Live:** https://regal-solution.com (deployed 2026-09-26).

## Features
- **Locale-prefixed routing:** `/bn` (default, `/` → 301 `/bn`) + `/en`, hreflang + canonical, language switcher.
- **8 products** (6 SaaS + 2 services) with landing pages: hero → features (title + description) → pricing/callback → FAQ → related.
  - SaaS: School, Apartment, Sales CRM, Mosque, POS, Bus Ticket
  - Services: E-commerce website, Custom software & website
- **Full-width hero carousel** on the home page (one slide per product, compact on mobile, fast autoplay).
- **Full-width products mega-menu** (desktop, spans the content area).
- **Mobile-responsive:** compact card grids (2-col), testimonial swipe carousel, no horizontal overflow.
- **Lead capture** (popup + floating button) → CRM / SMS (env-driven, gracefully skipped when unconfigured).
- **Blog** (bn/en, long-form Markdown) + **global search** + **WhatsApp + call floating buttons**.
- **Social links** — admin-managed (Filament), rendered in footer + Organization JSON-LD `sameAs`.
- **SEO/AI:** JSON-LD (Organization, SoftwareApplication/Product, FAQPage, BreadcrumbList, Article), Open Graph + Twitter Card, `sitemap.xml`, `robots.txt`, `llms.txt`.
- **Real logo + favicons + OG image** (1200×630).

## Tech Stack
- Laravel 12
- Filament 5
- SQLite (production) / MySQL (local dev — `regal_website`)
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

## Admin Panel (`/admin`)
- Login with `ADMIN_EMAIL` / `ADMIN_PASSWORD` from `.env`.
- **Content → Blog Posts** — write/manage blog posts.
- **Settings → Social Links** — add/edit Facebook, YouTube, etc.
- **Leads → Job Applications** — view career applications.
- Services + Page Contents resources for site content.

## Key Commands (after code changes)
```bash
npm run build            # rebuild Vite assets (required for CSS/JS edits)
php artisan migrate --force
php artisan db:seed --class=ProductSeeder --force
php artisan optimize:clear
php artisan storage:link  # once, for photo/CV uploads
```

## Environment Notes
- `REGAL_PHONE`, `REGAL_PHONES`, `REGAL_EMAIL`, `REGAL_WHATSAPP_LINK`, `REGAL_OFFICE_ADDRESS`, `REGAL_LOGO_PATH` — brand/contact.
- `ADMIN_EMAIL` / `ADMIN_PASSWORD` — admin login.
- `CRM_LEADS_API_URL/TOKEN`, `BULKSMSBD_*`, `NOTIFY_PHONE` — lead → CRM/SMS (skip+log when unconfigured).
- `RECAPTCHA_ENABLED/SITE_KEY/SECRET_KEY` — optional spam protection.
- `MAIL_MAILER` defaults to `log` — set real SMTP for email notifications.
- Ensure PHP extensions: `intl`, `zip`, `mbstring`, `fileinfo`, `pdo_mysql`.

## cPanel Deployment (ExonHost, no SSH)
Production architecture (locked docroot):
- App core: `/home/regalsol/regal_app`
- Web root: `/home/regalsol/public_html`
- `bootstrap/app.php` must set `$app->usePublicPath('/home/regalsol/public_html')`.
- `public_html/index.php` points to `../regal_app/...`.

Deploy method (UAPI + self-extracting PHP): see `docs/CPANEL_DEPLOY.md` + `DEPLOY_CHECKPOINT_2026-04-05.md`. `deploy.sh` builds + packages a clean archive.
