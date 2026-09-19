@extends('layouts.app')

@section('content')

{{-- ── Hero ── --}}
<section class="product-hero">
    <div class="container">
        <div class="product-hero-inner">
            <div class="product-badge">{{ __('site.erp_badge') }}</div>
            <h1 class="product-title">{{ __('site.erp_title') }}</h1>
            <p class="product-subtitle">
                {{ __('site.erp_subtitle') }}
            </p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn btn-primary">{{ __('site.erp_cta_demo') }}</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">{{ __('site.erp_cta_learn') }}</a>
            </div>
        </div>
    </div>
</section>

{{-- ── Modules ── --}}
<section class="page-section">
    <div class="container">
        <p class="section-eyebrow">{{ __('site.erp_module_eyebrow') }}</p>
        <h2 class="section-title">{{ __('site.erp_module_title') }}</h2>
        <p class="section-lead">
            {{ __('site.erp_module_lead') }}
        </p>

        <div class="coming-soon-notice">
            ✦ Detailed module content coming soon
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon" style="background:#f0f4ff;color:#3a5de0;">💰</div>
                <h3>{{ __('site.erp_module_1_title') }}</h3>
                <p>{{ __('site.erp_module_1_desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#fff8f0;color:#e06c25;">👷</div>
                <h3>{{ __('site.erp_module_2_title') }}</h3>
                <p>{{ __('site.erp_module_2_desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#f0fff6;color:#1a9e55;">📦</div>
                <h3>{{ __('site.erp_module_3_title') }}</h3>
                <p>{{ __('site.erp_module_3_desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#fff0f0;color:#e02525;">🛒</div>
                <h3>{{ __('site.erp_module_4_title') }}</h3>
                <p>{{ __('site.erp_module_4_desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#fdf0ff;color:#8b2de0;">📈</div>
                <h3>{{ __('site.erp_module_5_title') }}</h3>
                <p>{{ __('site.erp_module_5_desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#f0faff;color:#0e7bc4;">🔄</div>
                <h3>{{ __('site.erp_module_6_title') }}</h3>
                <p>{{ __('site.erp_module_6_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<section class="page-section">
    <div class="container">
        <div class="product-cta">
            <h2>{{ __('site.erp_cta_section_title') }}</h2>
            <p>{{ __('site.erp_cta_section_lead') }}</p>
            <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('contact') }}" class="btn-white">{{ __('site.erp_cta_consultation') }}</a>
                <a href="{{ route('contact') }}" class="btn-ghost">{{ __('site.erp_cta_sales') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
