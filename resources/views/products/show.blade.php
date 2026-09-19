@extends('layouts.app')

@push('jsonld')
@php
    $schemaProduct = json_encode([
        '@context' => 'https://schema.org',
        '@type' => $product->is_saas ? 'SoftwareApplication' : 'Product',
        'name' => $product->localizedName(),
        'description' => $product->localizedSummary(),
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web',
        'offers' => $product->localizedPricing()
            ? [
                '@type' => 'Offer',
                'availability' => 'https://schema.org/InStock',
                'priceCurrency' => 'BDT',
                'url' => url()->current(),
            ]
            : null,
        'url' => url()->current(),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $faqJson = null;
    if (! empty($product->localizedFaq())) {
        $faqJson = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($product->localizedFaq())->map(function ($item) {
                return [
                    '@type' => 'Question',
                    'name' => $item['q'] ?? '',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a'] ?? ''],
                ];
            })->values()->all(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    $breadcrumbJson = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => __('site.menu_home'), 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => __('site.menu_products'), 'item' => route('products.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $product->localizedName(), 'item' => url()->current()],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
<script type="application/ld+json">{!! $schemaProduct !!}</script>
@if ($faqJson)
<script type="application/ld+json">{!! $faqJson !!}</script>
@endif
<script type="application/ld+json">{!! $breadcrumbJson !!}</script>
@endpush

@section('content')

{{-- ── Hero ── --}}
<section class="product-hero">
    <div class="container">
        <div class="product-hero-inner">
            <div class="product-badge">{{ $product->is_saas ? __('site.product_type_saas') : __('site.product_type_service') }}</div>
            <h1 class="product-title">{{ $product->localizedName() }}</h1>
            <p class="product-subtitle">{{ $product->localizedSummary() }}</p>
            <div class="hero-cta">
                @if ($product->demo_url)
                    <a href="{{ $product->demo_url }}" target="_blank" rel="noopener" class="btn btn-primary">{{ __('site.product_demo') }}</a>
                @else
                    <a href="{{ route('contact') }}" class="btn btn-primary">{{ __('site.product_demo') }}</a>
                @endif
                @if ($product->register_url)
                    <a href="{{ $product->register_url }}" target="_blank" rel="noopener" class="btn btn-outline">{{ __('site.product_register') }}</a>
                @endif
                @if ($product->login_url)
                    <a href="{{ $product->login_url }}" target="_blank" rel="noopener" class="btn btn-outline">{{ __('site.product_login') }}</a>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ── Features ── --}}
@if (! empty($product->localizedFeatures()))
<section class="page-section">
    <div class="container">
        <p class="section-eyebrow reveal">{{ __('site.product_features_eyebrow') }}</p>
        <h2 class="section-title reveal">{{ __('site.product_features_title') }}</h2>

        <div class="feature-grid">
            @foreach ($product->localizedFeatures() as $feature)
                <div class="feature-card reveal">
                    <div class="feature-icon" style="background:#fff0f0;color:#e02525;">✓</div>
                    <h3>{{ $feature }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── Pricing / CTA ── --}}
<section class="page-section">
    <div class="container">
        <p class="section-eyebrow reveal">{{ __('site.product_pricing_eyebrow') }}</p>
        <h2 class="section-title reveal">{{ __('site.product_pricing_title') }}</h2>

        @if ($product->localizedPricing())
            <div class="pricing-grid">
                @foreach ($product->localizedPricing() as $plan)
                    <div class="pricing-card reveal">
                        <h3 class="pricing-card__name">{{ $plan['name'] ?? '' }}</h3>
                        <div class="pricing-card__price">{{ $plan['price'] ?? '' }}</div>
                        @if (! empty($plan['features']))
                            <ul class="pricing-card__features">
                                @foreach ($plan['features'] as $pf)
                                    <li>{{ $pf }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="pricing-empty reveal">
                <p>{{ __('site.product_pricing_contact') }}</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">{{ __('site.product_contact_pricing') }}</a>
            </div>
        @endif
    </div>
</section>

{{-- ── FAQ ── --}}
@if (! empty($product->localizedFaq()))
<section class="page-section">
    <div class="container">
        <p class="section-eyebrow reveal">{{ __('site.product_faq_eyebrow') }}</p>
        <h2 class="section-title reveal">{{ __('site.product_faq_title') }}</h2>

        <div class="faq-list">
            @foreach ($product->localizedFaq() as $faq)
                <details class="faq-item reveal">
                    <summary>{{ $faq['q'] ?? '' }}</summary>
                    <p>{{ $faq['a'] ?? '' }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── CTA ── --}}
<section class="page-section">
    <div class="container">
        <div class="product-cta reveal">
            <h2>{{ __('site.product_cta_title') }}</h2>
            <p>{{ __('site.product_cta_body') }}</p>
            <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
                @if ($product->demo_url)
                    <a href="{{ $product->demo_url }}" target="_blank" rel="noopener" class="btn-white">{{ __('site.product_demo') }}</a>
                @endif
                <a href="{{ route('contact') }}" class="btn-ghost">{{ __('site.product_contact_sales') }}</a>
            </div>
        </div>
    </div>
</section>

{{-- ── Related products ── --}}
@if ($related->isNotEmpty())
<section class="page-section" style="background: var(--paper);">
    <div class="container">
        <h2 class="section-title reveal">{{ __('site.product_related_title') }}</h2>
        <div class="products-grid products-grid--related">
            @foreach ($related as $rel)
                <a class="product-card reveal" href="{{ route('products.show', $rel->slug) }}">
                    <div class="product-card__icon">{{ strtoupper(mb_substr($rel->name_en, 0, 2)) }}</div>
                    <h3 class="product-card__name">{{ $rel->localizedName() }}</h3>
                    <p class="product-card__tagline">{{ $rel->localizedTagline() }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
