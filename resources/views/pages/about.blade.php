@extends('layouts.app')

@section('content')

{{-- ── ABOUT HERO ──────────────────────────────────────────────────── --}}
<section class="about-hero">
    <div class="container about-hero-inner">
        <div class="about-hero-text reveal">
            <span class="about-kicker">{{ __('site.about_kicker') }}</span>
            <h1>{{ __('site.about_hero_title') }}</h1>
            <p class="about-lead">{{ __('site.about_hero_lead') }}</p>
            <div class="about-hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary">{{ __('site.about_get_in_touch') }}</a>
                <a href="#our-story" class="btn-ghost">{{ __('site.about_our_story') }} ↓</a>
            </div>
        </div>
        <div class="about-hero-visual reveal reveal-delay-1" aria-hidden="true">
            <div class="about-badge-ring">
                <div class="about-badge-inner">
                    <span class="about-badge-year">2012</span>
                    <span class="about-badge-label">Founded</span>
                </div>
            </div>
            <div class="about-float-chip chip-a">POS &amp; Billing</div>
            <div class="about-float-chip chip-b">ERP Suite</div>
            <div class="about-float-chip chip-c">Bus Ticketing</div>
            <div class="about-float-chip chip-d">14+ Years</div>
        </div>
    </div>
</section>

{{-- ── STATS BAND ──────────────────────────────────────────────────── --}}
<section class="about-stats-band">
    <div class="container about-stats-grid">
        <div class="about-stat reveal">
            <div class="about-stat-num" data-count="50000">0</div>
            <div class="about-stat-label">{{ __('site.about_stats_active_users') }}</div>
        </div>
        <div class="about-stat reveal reveal-delay-1">
            <div class="about-stat-num" data-count="2500">0</div>
            <div class="about-stat-label">{{ __('site.about_stats_companies') }}</div>
        </div>
        <div class="about-stat reveal reveal-delay-2">
            <div class="about-stat-num" data-count="14">0</div>
            <div class="about-stat-label">{{ __('site.about_stats_years') }}</div>
        </div>
        <div class="about-stat reveal reveal-delay-3">
            <div class="about-stat-num" data-count="99">0</div>
            <div class="about-stat-label">{{ __('site.about_stats_uptime') }}</div>
        </div>
    </div>
</section>

{{-- ── OUR STORY ────────────────────────────────────────────────────── --}}
<section class="about-story page-section" id="our-story">
    <div class="container about-story-inner">
        <div class="about-story-text reveal">
            <span class="section-kicker">{{ __('site.about_section_kicker_story') }}</span>
            <h2>{{ __('site.about_story_heading') }}</h2>
            <p>{{ __('site.about_story_p1') }}</p>
            <p>{{ __('site.about_story_p2') }}</p>
            <p>{{ __('site.about_story_p3') }}</p>
        </div>
        <div class="about-timeline reveal reveal-delay-1">
            <div class="about-tl-item">
                <div class="about-tl-dot"></div>
                <div class="about-tl-content">
                    <span class="about-tl-year">{{ __('site.about_timeline_1_year') }}</span>
                    <p>{{ __('site.about_timeline_1_text') }}</p>
                </div>
            </div>
            <div class="about-tl-item">
                <div class="about-tl-dot"></div>
                <div class="about-tl-content">
                    <span class="about-tl-year">{{ __('site.about_timeline_2_year') }}</span>
                    <p>{{ __('site.about_timeline_2_text') }}</p>
                </div>
            </div>
            <div class="about-tl-item">
                <div class="about-tl-dot"></div>
                <div class="about-tl-content">
                    <span class="about-tl-year">{{ __('site.about_timeline_3_year') }}</span>
                    <p>{{ __('site.about_timeline_3_text') }}</p>
                </div>
            </div>
            <div class="about-tl-item">
                <div class="about-tl-dot"></div>
                <div class="about-tl-content">
                    <span class="about-tl-year">{{ __('site.about_timeline_4_year') }}</span>
                    <p>{{ __('site.about_timeline_4_text') }}</p>
                </div>
            </div>
            <div class="about-tl-item">
                <div class="about-tl-dot"></div>
                <div class="about-tl-content">
                    <span class="about-tl-year">{{ __('site.about_timeline_5_year') }}</span>
                    <p>{{ __('site.about_timeline_5_text') }}</p>
                </div>
            </div>
            <div class="about-tl-item about-tl-item--active">
                <div class="about-tl-dot"></div>
                <div class="about-tl-content">
                    <span class="about-tl-year">{{ __('site.about_timeline_6_year') }}</span>
                    <p>{{ __('site.about_timeline_6_text') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── MISSION & VISION ─────────────────────────────────────────────── --}}
<section class="about-mv page-section" style="background: var(--paper);">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.about_mv_kicker') }}</span>
            <h2>{{ __('site.about_mv_title') }}</h2>
        </div>
        <div class="about-mv-grid">
            <div class="about-mv-card reveal">
                <div class="about-mv-icon">🎯</div>
                <h3>{{ __('site.about_mission_title') }}</h3>
                <p>{{ __('site.about_mission_text') }}</p>
            </div>
            <div class="about-mv-card reveal reveal-delay-1">
                <div class="about-mv-icon">🔭</div>
                <h3>{{ __('site.about_vision_title') }}</h3>
                <p>{{ __('site.about_vision_text') }}</p>
            </div>
            <div class="about-mv-card reveal reveal-delay-2">
                <div class="about-mv-icon">💡</div>
                <h3>{{ __('site.about_values_title') }}</h3>
                <ul class="about-values-list">
                    <li>{{ __('site.about_values_1') }}</li>
                    <li>{{ __('site.about_values_2') }}</li>
                    <li>{{ __('site.about_values_3') }}</li>
                    <li>{{ __('site.about_values_4') }}</li>
                    <li>{{ __('site.about_values_5') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ── PRODUCTS OVERVIEW ────────────────────────────────────────────── --}}
<section class="about-products page-section">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.about_products_kicker') }}</span>
            <h2>{{ __('site.about_products_title') }}</h2>
            <p>{{ __('site.about_products_lead') }}</p>
        </div>
        <div class="about-products-grid">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="about-product-card reveal">
                    <div class="about-product-icon">{{ strtoupper(mb_substr($product->name_en, 0, 2)) }}</div>
                    <h3>{{ $product->localizedName() }}</h3>
                    <p>{{ $product->localizedTagline() }}</p>
                    <span class="about-product-link">{{ __('site.about_products_explore') }} →</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ── LEADERSHIP ───────────────────────────────────────────────────── --}}
<section class="about-leadership page-section" style="background: var(--paper);">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.about_leadership_kicker') }}</span>
            <h2>{{ __('site.about_leadership_title') }}</h2>
        </div>
        <div class="about-leader-card reveal">
            <div class="about-leader-avatar">
                <span>ER</span>
            </div>
            <div class="about-leader-info">
                <h3>{{ __('site.about_leader_name') }}</h3>
                <span class="about-leader-role">{{ __('site.about_leader_role') }}</span>
                <p>{{ __('site.about_leader_bio_1') }}</p>
                <p>{{ __('site.about_leader_bio_2') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ── GLOBAL PRESENCE ──────────────────────────────────────────────── --}}
<section class="about-global page-section">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.about_global_kicker') }}</span>
            <h2>{{ __('site.about_global_title') }}</h2>
            <p>{{ __('site.about_global_lead') }}</p>
        </div>
        <div class="about-regions-grid">
            <div class="about-region-card reveal">
                <span class="about-region-flag">🇧🇩</span>
                <h4>{{ __('site.about_region_bd_name') }}</h4>
                <p>{{ __('site.about_region_bd_desc') }}</p>
            </div>
            <div class="about-region-card reveal reveal-delay-1">
                <span class="about-region-flag">🇮🇳</span>
                <h4>{{ __('site.about_region_in_np_name') }}</h4>
                <p>{{ __('site.about_region_in_np_desc') }}</p>
            </div>
            <div class="about-region-card reveal reveal-delay-2">
                <span class="about-region-flag">🌍</span>
                <h4>{{ __('site.about_region_me_name') }}</h4>
                <p>{{ __('site.about_region_me_desc') }}</p>
            </div>
            <div class="about-region-card reveal reveal-delay-3">
                <span class="about-region-flag">🌐</span>
                <h4>{{ __('site.about_region_intl_name') }}</h4>
                <p>{{ __('site.about_region_intl_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ── CTA ──────────────────────────────────────────────────────────── --}}
<section class="cta-band">
    <div class="container cta-band-inner">
        <div>
            <h2>{{ __('site.about_cta_title') }}</h2>
            <p>{{ __('site.about_cta_body') }}</p>
        </div>
        <div class="cta-band-actions">
            <a href="{{ route('contact') }}" class="btn-primary">{{ __('site.about_cta_contact') }}</a>
            <a href="{{ route('products.index') }}" class="btn-ghost-white">{{ __('site.about_cta_products') }}</a>
        </div>
    </div>
</section>

@endsection

