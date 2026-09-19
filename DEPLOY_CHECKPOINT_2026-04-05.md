# Deployment Checkpoint (2026-04-05)

## Incident summary (today)
- Domain: https://regal-solution.com
- Hosting user: regalsol
- Initial live issue: Index of / (directory listing)
- Second issue after folder changes: HTTP 500
- Final issue after 500 fixed: site loaded but CSS/JS looked broken
- Additional issue after site was fixed: Bangla switch (`/lang/bn`) returned 403 Forbidden
- Final state now: site loads correctly with proper design/assets and language switch works

## What actually caused the issues
1. cPanel main domain document root is locked to `/public_html` and could not be changed to Laravel `public`.
2. Laravel app was moved outside web root (`/home/regalsol/regal_app`) which is correct, but app still treated `regal_app/public` as public path.
3. Vite build files existed in `/public_html/build`, but Blade `@vite(...)` check used `public_path('build/manifest.json')`.
4. Because `public_path()` still pointed to `regal_app/public`, Laravel did not include production CSS/JS.

## Final production architecture (working)
- Application core: `/home/regalsol/regal_app`
  - app, bootstrap, config, database, lang, resources, routes, storage, vendor, artisan, .env
- Web root for domain: `/home/regalsol/public_html`
  - index.php, .htaccess, build, css, js, images, fonts, favicon files

This is the correct structure for shared hosting when domain root cannot be changed.

## Critical fixes applied

### 1) `public_html/index.php` path fix
Use paths that point to `regal_app`:
- `../regal_app/vendor/autoload.php`
- `../regal_app/bootstrap/app.php`
- `../regal_app/storage/framework/maintenance.php`

### 2) Laravel public path override (most important)
File: `/home/regalsol/regal_app/bootstrap/app.php`

After app creation, set:

`$app->usePublicPath('/home/regalsol/public_html');`

Without this, Vite assets can appear broken even when `/public_html/build/manifest.json` exists.

### 3) Cleanup and cache refresh
- Remove `hot` and `.hot` files if present.
- Run:
  - `php artisan optimize:clear`
  - `php artisan optimize`

### 4) Permissions verified
- `/home/regalsol/regal_app/storage` -> 755 (or 775 if needed)
- `/home/regalsol/regal_app/bootstrap/cache` -> 755 (or 775 if needed)

### 5) Language route 403 fix
- Route exists in Laravel: `/lang/{locale}`
- Server returned 403 before Laravel handled the request
- Root cause: `.htaccess` deny rule blocked `lang` because it was treated like the Laravel `/lang` directory

Problematic rule:

`RewriteRule ^(app|bootstrap|config|database|lang|node_modules|resources|routes|storage|tests|vendor)(/|$) - [F,L]`

Fixed rule:

`RewriteRule ^(app|bootstrap|config|database|node_modules|resources|routes|storage|tests|vendor)(/|$) - [F,L]`

Important note:
- Do not block `lang` in `.htaccess` if the app uses `/lang/...` as a public route.
- This 403 comes from Apache/LiteSpeed, not from Laravel.

## Current expected config
- `.env` location: `/home/regalsol/regal_app/.env`
- Required values:
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_URL=https://regal-solution.com`

## Fast validation checklist (use next time)
1. Open `https://regal-solution.com/build/manifest.json`
   - Must return JSON, not 404.
2. Confirm `public_html/index.php` points to `../regal_app/...` paths.
3. Confirm `bootstrap/app.php` contains:
   - `$app->usePublicPath('/home/regalsol/public_html');`
4. Confirm no `hot` or `.hot` files exist.
5. Confirm `/lang/bn` does not return 403.
6. If language switch fails, check `.htaccess` deny rule for `lang`.
7. Run `php artisan optimize:clear` then hard refresh browser (Ctrl+F5).

## Prevention rules (to avoid future hassle)
1. Never keep Laravel core inside `public_html` unless absolutely required.
2. Always keep only public assets and front controller in `public_html`.
3. For locked docroot hosting, always set `usePublicPath('/home/<user>/public_html')` in `bootstrap/app.php`.
4. After any deployment/move, always verify manifest URL and asset loading before closing the task.
5. Do not add broad `.htaccess` block rules that conflict with public routes like `/lang/{locale}`.

## Notes for next deployment
- If Node is unavailable on server, run `npm run build` locally and upload `public/build` to `/public_html/build`.
- After upload/deploy, run optimize clear commands from `/home/regalsol/regal_app`.
- If UI appears unstyled, check public path override before rebuilding assets.

---
Checkpoint updated after production incident resolution on 2026-04-05.
