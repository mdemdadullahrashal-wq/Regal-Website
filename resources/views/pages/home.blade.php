@extends('layouts.app')

@section('content')

{{-- ── BRAND SLOGAN STRIP ── --}}
<div class="home-slogan">
    <div class="container home-slogan__inner">
        <span class="home-slogan__line" aria-hidden="true"></span>
        <span class="home-slogan__text">{{ __('site.home_slogan') }}</span>
        <span class="home-slogan__line" aria-hidden="true"></span>
    </div>
</div>

{{-- ════════════════════════════════════════
    HERO SLIDER (full-width, one slide per product)
════════════════════════════════════════ --}}
@php
    $heroSlides = $products->map(function ($p) {
        return [
            'accent' => $p->accentColor(),
            'badge' => $p->is_saas ? __('site.product_type_saas') : __('site.product_type_service'),
            'title' => $p->localizedName(),
            'desc' => $p->localizedSummary(),
            'cta_url' => route('products.show', $p->slug),
            'cta_label' => __('site.slide_view_details'),
            'icon' => $p,
            'visual_kicker' => $p->localizedTagline(),
        ];
    })->values()->all();
@endphp
@include('partials.hero-slider', ['slides' => $heroSlides])

{{-- ════════════════════════════════════════
    PRODUCTS GRID (all 8, data-driven)
════════════════════════════════════════ --}}
<section class="page-section" id="products">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.products_section_kicker') }}</span>
            <h2 class="section-title">{{ __('site.home_products_title') }}</h2>
            <p class="section-lead">{{ __('site.home_products_lead') }}</p>
        </div>

        <div class="products-grid">
            @foreach ($products as $product)
                <a class="product-card reveal" href="{{ route('products.show', $product->slug) }}" style="--accent: {{ $product->accentColor() }}">
                    <div class="product-card__top">
                        <span class="product-card__badge {{ $product->is_saas ? 'product-card__badge--saas' : 'product-card__badge--service' }}">
                            {{ $product->is_saas ? __('site.product_type_saas') : __('site.product_type_service') }}
                        </span>
                        <span class="product-card__arrow">→</span>
                    </div>
                    <div class="product-card__icon">@include('partials.product-icon', ['product' => $product])</div>
                    <h3 class="product-card__name">{{ $product->localizedName() }}</h3>
                    <p class="product-card__tagline">{{ $product->localizedTagline() }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    TRUST & STATS SECTION
════════════════════════════════════════ --}}
<section class="stats-trust-section">
    <div class="container">
        <div class="trust-header reveal">
            <h2>{{ __('site.stats_section_title') }}</h2>
            <p>{{ __('site.stats_section_lead') }}</p>
        </div>

        <div class="stats-grid">
            <div class="stat-item reveal">
                <div class="stat-number" data-count="50000">0</div>
                <div class="stat-text">{{ __('site.stat_active_users') }}</div>
                <div class="stat-subtext">{{ __('site.stat_across_products') }}</div>
            </div>
            <div class="stat-item reveal reveal-delay-1">
                <div class="stat-number" data-count="2500">0</div>
                <div class="stat-text">{{ __('site.stat_companies') }}</div>
                <div class="stat-subtext">{{ __('site.stat_using_regal') }}</div>
            </div>
            <div class="stat-item reveal reveal-delay-2">
                <div class="stat-number" data-count="14">0</div>
                <div class="stat-text">{{ __('site.stat_years') }}</div>
                <div class="stat-subtext">{{ __('site.stat_founded') }}</div>
            </div>
            <div class="stat-item reveal reveal-delay-3">
                <div class="stat-number" data-count="99">0</div>
                <div class="stat-text">{{ __('site.stat_uptime') }}</div>
                <div class="stat-subtext">{{ __('site.stat_guaranteed') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    CUSTOMER TESTIMONIALS
════════════════════════════════════════ --}}
<section class="testimonials-section">
    <div class="container">
        <div class="testimonials-header reveal">
            <h2>{{ __('site.testimonials_title') }}</h2>
            <p>{{ __('site.testimonials_lead') }}</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card reveal">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"{{ __('site.home_testimonial_1_text') }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:linear-gradient(135deg,#ff6b6b,#ee5a6f);">AF</div>
                    <div>
                        <div class="author-name">{{ __('site.home_testimonial_1_name') }}</div>
                        <div class="author-role">{{ __('site.home_testimonial_1_role') }}</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal reveal-delay-1">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"{{ __('site.home_testimonial_2_text') }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:linear-gradient(135deg,#4ecdc4,#44a8b3);">RH</div>
                    <div>
                        <div class="author-name">{{ __('site.home_testimonial_2_name') }}</div>
                        <div class="author-role">{{ __('site.home_testimonial_2_role') }}</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal reveal-delay-2">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"{{ __('site.home_testimonial_3_text') }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:linear-gradient(135deg,#95e1d3,#7dd3c0);">NK</div>
                    <div>
                        <div class="author-name">{{ __('site.home_testimonial_3_name') }}</div>
                        <div class="author-role">{{ __('site.home_testimonial_3_role') }}</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal reveal-delay-3">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"{{ __('site.home_testimonial_4_text') }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:linear-gradient(135deg,#f7b731,#f5af19);">MA</div>
                    <div>
                        <div class="author-name">{{ __('site.home_testimonial_4_name') }}</div>
                        <div class="author-role">{{ __('site.home_testimonial_4_role') }}</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal reveal-delay-1">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"{{ __('site.home_testimonial_5_text') }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:linear-gradient(135deg,#a8edea,#fed6e3);">SR</div>
                    <div>
                        <div class="author-name">{{ __('site.home_testimonial_5_name') }}</div>
                        <div class="author-role">{{ __('site.home_testimonial_5_role') }}</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal reveal-delay-2">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"{{ __('site.home_testimonial_6_text') }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background:linear-gradient(135deg,#ff9a9e,#fad0c4);">TI</div>
                    <div>
                        <div class="author-name">{{ __('site.home_testimonial_6_name') }}</div>
                        <div class="author-role">{{ __('site.home_testimonial_6_role') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    WHY CHOOSE REGAL
════════════════════════════════════════ --}}
<section class="why-choose-section">
    <div class="container">
        <div class="why-header reveal">
            <h2>{{ __('site.why_title') }}</h2>
            <p>{{ __('site.why_lead') }}</p>
        </div>

        <div class="why-grid">
            <div class="why-card reveal">
                <div class="why-icon">🇧🇩</div>
                <h3>{{ __('site.home_why_card_1_title') }}</h3>
                <p>{{ __('site.home_why_card_1_desc') }}</p>
            </div>
            <div class="why-card reveal reveal-delay-1">
                <div class="why-icon">⚡</div>
                <h3>{{ __('site.home_why_card_2_title') }}</h3>
                <p>{{ __('site.home_why_card_2_desc') }}</p>
            </div>
            <div class="why-card reveal reveal-delay-2">
                <div class="why-icon">🔒</div>
                <h3>{{ __('site.home_why_card_3_title') }}</h3>
                <p>{{ __('site.home_why_card_3_desc') }}</p>
            </div>
            <div class="why-card reveal reveal-delay-3">
                <div class="why-icon">🎯</div>
                <h3>{{ __('site.home_why_card_4_title') }}</h3>
                <p>{{ __('site.home_why_card_4_desc') }}</p>
            </div>
            <div class="why-card reveal reveal-delay-1">
                <div class="why-icon">👥</div>
                <h3>{{ __('site.home_why_card_5_title') }}</h3>
                <p>{{ __('site.home_why_card_5_desc') }}</p>
            </div>
            <div class="why-card reveal reveal-delay-2">
                <div class="why-icon">📊</div>
                <h3>{{ __('site.home_why_card_6_title') }}</h3>
                <p>{{ __('site.home_why_card_6_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    CTA BAND
════════════════════════════════════════ --}}
<section class="cta-band">
    <div class="cta-inner reveal">
        <h2>{{ __('site.cta_band_title') }}</h2>
        <p>{{ __('site.cta_band_body') }}</p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn btn-primary">{{ __('site.cta_band_btn_demo') }}</a>
            <a href="{{ route('products.index') }}" class="btn btn-ghost-white">{{ __('site.cta_band_btn_products') }}</a>
        </div>
    </div>
</section>

@endsection
