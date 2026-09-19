<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Supported locales, in priority order (Bangla is default).
     */
    public const SUPPORTED = ['bn', 'en'];

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Prefer the {locale} route parameter.
        $locale = $request->route('locale');

        // 2. Fall back to session, then app config.
        if (! in_array($locale, self::SUPPORTED, true)) {
            $locale = session('locale', config('app.locale'));
        }

        // 3. Final guard — default to Bangla.
        if (! in_array($locale, self::SUPPORTED, true)) {
            $locale = 'bn';
        }

        session(['locale' => $locale]);
        app()->setLocale($locale);

        // Make `route('...')` auto-fill the current locale parameter.
        URL::defaults(['locale' => $locale]);

        return $next($request);
    }
}
