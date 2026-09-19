<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? config('regal.brand_name') }}</title>
    <meta name="description" content="{{ $metaDescription ?? config('regal.tagline') }}">
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

            {{-- Products mega-dropdown --}}
            <div class="nav-mega {{ request()->routeIs('pos','erp','bus-ticket') ? 'nav-mega--active' : '' }}" id="products-dropdown">
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
                        <a href="{{ route('pos') }}" class="nav-mega__item nav-mega__item--pos" role="menuitem">
                            <div class="nav-mega__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2.5"/>
                                    <path d="M8 21h8M12 17v4"/>
                                    <path d="M7 9h2m0 0v4m0-4h3"/>
                                </svg>
                            </div>
                            <div class="nav-mega__text">
                                <strong>{{ __('site.nav_mega_pos_name') }}</strong>
                                <span>{{ __('site.nav_mega_pos_desc') }}</span>
                            </div>
                            <div class="nav-mega__arrow">→</div>
                        </a>

                        <a href="{{ route('erp') }}" class="nav-mega__item nav-mega__item--erp" role="menuitem">
                            <div class="nav-mega__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="9" height="8" rx="1.5"/>
                                    <rect x="13" y="2" width="9" height="8" rx="1.5"/>
                                    <rect x="2" y="14" width="9" height="8" rx="1.5"/>
                                    <rect x="13" y="14" width="9" height="8" rx="1.5"/>
                                </svg>
                            </div>
                            <div class="nav-mega__text">
                                <strong>{{ __('site.nav_mega_erp_name') }}</strong>
                                <span>{{ __('site.nav_mega_erp_desc') }}</span>
                            </div>
                            <div class="nav-mega__arrow">→</div>
                        </a>

                        <a href="{{ route('bus-ticket') }}" class="nav-mega__item nav-mega__item--bus" role="menuitem">
                            <div class="nav-mega__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="13" rx="2.5"/>
                                    <path d="M3 10h18M8 20h8"/>
                                    <circle cx="7.5" cy="20" r="1.5"/><circle cx="16.5" cy="20" r="1.5"/>
                                </svg>
                            </div>
                            <div class="nav-mega__text">
                                <strong>{{ __('site.nav_mega_bus_name') }}</strong>
                                <span>{{ __('site.nav_mega_bus_desc') }}</span>
                            </div>
                            <div class="nav-mega__arrow">→</div>
                        </a>
                    </div>
                    <div class="nav-mega__footer">
                        <a href="{{ route('contact') }}" class="nav-mega__cta">{{ __('site.nav_mega_footer_cta') }}</a>
                    </div>
                </div>
            </div>

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
            <a class="nav-lang" href="{{ route('locale.switch', app()->getLocale() === 'en' ? 'bn' : 'en') }}"
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
            <p><strong>{{ __('site.phone') }}:</strong> {{ config('regal.phone') }}</p>
            <p><strong>{{ __('site.email') }}:</strong> {{ config('regal.email') }}</p>
            <p>{{ config('regal.office_address') }}</p>
        </div>
        <div>
            <a href="{{ route('privacy') }}">{{ __('site.privacy_title') }}</a><br>
            <a href="{{ route('terms') }}">{{ __('site.terms_title') }}</a>
        </div>
    </div>
</footer>

<a class="whatsapp-fab" href="{{ config('regal.whatsapp_link') }}" target="_blank" rel="noopener">WhatsApp</a>
</body>
</html>
