<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? config('regal.brand_name') }}</title>
    <meta name="description" content="{{ $metaDescription ?? config('regal.tagline') }}">

    @php
        $currentRouteName = Route::currentRouteName();
        $routeParams = request()->route() ? request()->route()->parameters() : [];
        $currentLocale = app()->getLocale();
        $altLocale = $currentLocale === 'bn' ? 'en' : 'bn';

        $localeUrls = [];
        foreach (['bn', 'en'] as $l) {
            if ($currentRouteName) {
                $p = $routeParams;
                $p['locale'] = $l;
                try {
                    $localeUrls[$l] = route($currentRouteName, $p);
                } catch (\Throwable) {
                    $localeUrls[$l] = url('/'.$l);
                }
            } else {
                $localeUrls[$l] = url('/'.$l);
            }
        }
        $canonicalUrl = $localeUrls[$currentLocale] ?? url('/');

        $organizationJson = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => config('regal.brand_name'),
            'url' => config('app.url'),
            'telephone' => '+88'.config('regal.phone'),
            'email' => config('regal.email'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => config('regal.office_address'),
                'addressLocality' => 'Dhaka',
                'addressCountry' => 'BD',
            ],
            'sameAs' => [
                config('regal.whatsapp_link'),
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    @endphp

    {{-- Canonical + hreflang (bn default, en alternate) --}}
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="alternate" hreflang="bn" href="{{ $localeUrls['bn'] }}">
    <link rel="alternate" hreflang="en" href="{{ $localeUrls['en'] }}">
    <link rel="alternate" hreflang="x-default" href="{{ $localeUrls['bn'] }}">

    {{-- Organization schema (sitewide) --}}
    <script type="application/ld+json">{!! $organizationJson !!}</script>

    @stack('jsonld')

    @php
        $faviconIcoPath = public_path('favicon.ico');
        $faviconPngPath = public_path('favicon.png');
        $appleTouchIconPath = public_path('apple-touch-icon.png');
        $faviconSvgPath = public_path('favicon.svg');
        $logoFallbackPath = public_path(config('regal.logo_path'));
        $hasValidIco = file_exists($faviconIcoPath) && filesize($faviconIcoPath) > 0;
        $hasPngFavicon = file_exists($faviconPngPath) && filesize($faviconPngPath) > 0;
        $hasAppleTouchIcon = file_exists($appleTouchIconPath) && filesize($appleTouchIconPath) > 0;
        $hasSvgFavicon = file_exists($faviconSvgPath) && filesize($faviconSvgPath) > 0;
        $hasSvgFallback = file_exists($logoFallbackPath);
    @endphp
    @if ($hasValidIco)
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    @elseif ($hasPngFavicon)
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    @elseif ($hasSvgFavicon)
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v={{ filemtime($faviconSvgPath) }}">
    @elseif ($hasSvgFallback)
        <link rel="icon" type="image/svg+xml" href="{{ asset(config('regal.logo_path')) }}?v={{ filemtime($logoFallbackPath) }}">
    @endif
    @if ($hasAppleTouchIcon)
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    @endif
    @if (config('regal.gtm_id'))
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer',@json(config('regal.gtm_id')));
        </script>
    @endif
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @if(app()->getLocale() === 'bn')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&display=swap" rel="stylesheet">
    @if (config('regal.recaptcha_enabled') && config('regal.recaptcha_site_key'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
</head>
<body class="lang-{{ app()->getLocale() }}">
<header class="site-header" id="site-header">
    <div class="container nav-wrap">

        {{-- Brand --}}
        <a class="brand" href="{{ route('home') }}">
            @if (file_exists(public_path(config('regal.logo_path'))))
                <img class="brand-logo" src="{{ asset(config('regal.logo_path')) }}" alt="{{ config('regal.brand_name') }} logo">
            @else
                <span class="brand-mark">R</span>
                <span class="brand-name-text">{{ config('regal.brand_name') }}</span>
            @endif
        </a>

        {{-- Desktop nav --}}
        <nav class="nav-links" id="nav-links" role="navigation" aria-label="Main navigation">

            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'nav-link--active' : '' }}">
                {{ __('site.menu_home') }}
            </a>

            <a href="{{ route('about') }}"
               class="nav-link {{ request()->routeIs('about') ? 'nav-link--active' : '' }}">
                {{ __('site.menu_about') }}
            </a>

            {{-- Products mega-dropdown (data-driven) --}}
            <div class="nav-mega {{ request()->routeIs('products.index','products.show') ? 'nav-mega--active' : '' }}" id="products-dropdown">
                <button class="nav-link nav-mega__trigger" id="products-trigger"
                        aria-haspopup="true" aria-expanded="false">
                    {{ __('site.menu_products') }}
                    <svg class="nav-chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><polyline points="4,6 8,10 12,6"/></svg>
                </button>

                <div class="nav-mega__panel" role="menu">
                    <div class="nav-mega__header">
                        <span class="nav-mega__eyebrow">{{ __('site.nav_mega_header_eyebrow') }}</span>
                        <p class="nav-mega__tagline">{{ __('site.nav_mega_header_tagline') }}</p>
                    </div>
                    <div class="nav-mega__grid">
                        @forelse ($navProducts ?? [] as $navProduct)
                            <a href="{{ route('products.show', $navProduct->slug) }}" class="nav-mega__item" role="menuitem">
                                <div class="nav-mega__icon" style="--accent: {{ $navProduct->accentColor() }}">
                                    @include('partials.product-icon', ['product' => $navProduct])
                                </div>
                                <div class="nav-mega__text">
                                    <strong>{{ $navProduct->localizedName() }}</strong>
                                    <span>{{ $navProduct->localizedTagline() }}</span>
                                </div>
                                <div class="nav-mega__arrow">→</div>
                            </a>
                        @empty
                            <a href="{{ route('products.index') }}" class="nav-mega__item" role="menuitem">
                                <div class="nav-mega__text"><strong>{{ __('site.menu_products') }}</strong></div>
                            </a>
                        @endforelse
                    </div>
                    <div class="nav-mega__footer">
                        <a href="{{ route('products.index') }}" class="nav-mega__cta">{{ __('site.nav_mega_footer_cta') }}</a>
                    </div>
                </div>
            </div>

            <a href="{{ route('blog.index') }}"
               class="nav-link {{ request()->routeIs('blog.index','blog.show') ? 'nav-link--active' : '' }}">
                {{ __('site.menu_blog') }}
            </a>

            <a href="{{ route('career') }}"
               class="nav-link {{ request()->routeIs('career') ? 'nav-link--active' : '' }}">
                {{ __('site.menu_career') }}
            </a>

            <a href="{{ route('contact') }}"
               class="nav-link {{ request()->routeIs('contact') ? 'nav-link--active' : '' }}">
                {{ __('site.menu_contact') }}
            </a>

        </nav>

        {{-- Right side actions --}}
        <div class="nav-actions">
            <form class="nav-search" method="get" action="{{ route('search') }}" role="search">
                <input type="search" name="q" value="{{ request('q') }}" placeholder="{{ __('site.search_placeholder') }}" aria-label="{{ __('site.search_placeholder') }}">
            </form>
            <a class="nav-lang" href="{{ $localeUrls[$altLocale] }}"
               title="Switch language">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round">
                    <circle cx="10" cy="10" r="8"/>
                    <path d="M10 2a14.5 14.5 0 0 1 0 16M10 2a14.5 14.5 0 0 0 0 16M2 10h16"/>
                </svg>
                {{ __('site.lang_switch') }}
            </a>
            <a href="{{ route('contact') }}" class="nav-cta">{{ __('site.nav_get_demo') }}</a>
            <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>

    </div>
</header>

<main>
    @if (session('success'))
        <div class="container mt-24">
            <div class="flash">{{ session('success') }}</div>
        </div>
    @endif
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h3>{{ config('regal.brand_name') }}</h3>
            <p>{{ config('regal.tagline') }}</p>
        </div>
        <div>
            <p><strong>{{ __('site.phone') }}:</strong>
                @foreach (config('regal.phones', []) as $ph)
                    <a class="tel-link" href="tel:{{ $ph }}">{{ $ph }}</a>{{ ! $loop->last ? ', ' : '' }}
                @endforeach
            </p>
            <p><strong>{{ __('site.email') }}:</strong> {{ config('regal.email') }}</p>
            <p>{{ config('regal.office_address') }}</p>
        </div>
        <div>
            <a href="{{ route('products.index') }}">{{ __('site.menu_products') }}</a><br>
            <a href="{{ route('blog.index') }}">{{ __('site.menu_blog') }}</a><br>
            <a href="{{ route('privacy') }}">{{ __('site.privacy_title') }}</a><br>
            <a href="{{ route('terms') }}">{{ __('site.terms_title') }}</a>
        </div>
    </div>
</footer>

{{-- Floating action buttons --}}
<a class="whatsapp-fab" href="{{ config('regal.whatsapp_link') }}" target="_blank" rel="noopener">WhatsApp</a>
<a class="call-fab" href="tel:{{ config('regal.phones.0', config('regal.phone')) }}" title="{{ __('site.call_now') }}">📞</a>

{{-- Lead capture popup (sitewide) --}}
<div class="lead-popup" id="lead-popup" aria-hidden="true">
    <div class="lead-popup__overlay" data-lead-close></div>
    <div class="lead-popup__panel" role="dialog" aria-modal="true" aria-labelledby="lead-popup-title">
        <button class="lead-popup__close" data-lead-close aria-label="Close">×</button>
        <h3 id="lead-popup-title">{{ __('site.lead_popup_title') }}</h3>
        <p class="lead-popup__sub">{{ __('site.lead_popup_sub') }}</p>
        @include('partials.lead-form')
    </div>
</div>
<button class="lead-fab" id="lead-fab" aria-haspopup="dialog">{{ __('site.lead_fab_label') }}</button>

</body>
</html>
