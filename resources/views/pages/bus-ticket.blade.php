@extends('layouts.app')

@section('content')

{{-- ════════════════════════════════════════
    HERO — animated road + bus
════════════════════════════════════════ --}}
<section class="bt-hero">

    {{-- Background blobs --}}
    <div class="bt-blob bt-blob-1"></div>
    <div class="bt-blob bt-blob-2"></div>
    <div class="bt-blob bt-blob-3"></div>

    <div class="container bt-hero-container">
        {{-- Left: copy --}}
        <div class="bt-hero-copy reveal">
            <div class="product-badge">{{ __('site.bt_badge') }}</div>
            <h1 class="product-title">{{ __('site.bt_title_main') }}<br><span class="bt-gradient-text">{{ __('site.bt_title_sub') }}</span></h1>
            <p class="product-subtitle">
                {{ __('site.bt_subtitle') }}
            </p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn btn-primary">{{ __('site.bt_cta_demo') }}</a>
                <a href="#bt-features" class="btn btn-outline">{{ __('site.bt_cta_features') }}</a>
            </div>
        </div>

        {{-- Right: animated bus dashboard card --}}
        <div class="bt-hero-visual reveal reveal-delay-2">
            <div class="bt-mockup">
                <div class="bt-mockup-bar">
                    <span class="bt-dot" style="background:#ff5f57;"></span>
                    <span class="bt-dot" style="background:#febc2e;"></span>
                    <span class="bt-dot" style="background:#28c840;"></span>
                    <span class="bt-mockup-title">{{ __('site.bt_mockup_title') }}</span>
                </div>

                {{-- Route animation inside card --}}
                <div class="bt-route-track">
                    <div class="bt-stop bt-stop-active">
                        <span class="bt-stop-dot"></span>
                        <span class="bt-stop-name">{{ __('site.bt_location_dhaka') }}</span>
                    </div>
                    <div class="bt-route-line">
                        <div class="bt-bus-icon">🚌</div>
                        <div class="bt-road-dash"></div>
                    </div>
                    <div class="bt-stop">
                        <span class="bt-stop-dot"></span>
                        <span class="bt-stop-name">{{ __('site.bt_location_comilla') }}</span>
                    </div>
                    <div class="bt-route-line">
                        <div class="bt-road-dash"></div>
                    </div>
                    <div class="bt-stop">
                        <span class="bt-stop-dot"></span>
                        <span class="bt-stop-name">{{ __('site.bt_location_chittagong') }}</span>
                    </div>
                </div>

                {{-- Booking info row --}}
                <div class="bt-info-row">
                    <div class="bt-info-chip bt-chip-green">{{ __('site.bt_chip_confirmed') }}</div>
                    <div class="bt-info-chip bt-chip-blue">{{ __('site.bt_chip_seats') }}</div>
                </div>

                {{-- Seat grid --}}
                <div class="bt-seat-grid">
                    @php $seatColors = ['booked','booked','free','free','free','booked','free','free','booked','free','free','free','free','booked','free','booked']; @endphp
                    @foreach($seatColors as $seat)
                        <div class="bt-seat bt-seat-{{ $seat }}"></div>
                    @endforeach
                </div>

                <div class="bt-mockup-footer">
                    <span class="bt-stat-pill bt-animated-pulse">● Live</span>
                    <span style="font-size:12px;color:#888;">{{ __('site.bt_mock_fare') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Scrolling tech ticker --}}
    <div class="bt-ticker-wrap">
        <div class="bt-ticker">
            <span>Seat-wise Booking</span><span class="bt-ticker-dot">✦</span>
            <span>QR E-Tickets</span><span class="bt-ticker-dot">✦</span>
            <span>{{ __('site.home_slider_bus_feature_1') }}</span><span class="bt-ticker-dot">✦</span>
            <span>QR E-Tickets</span><span class="bt-ticker-dot">✦</span>
            <span>Multi-Stop Routes</span><span class="bt-ticker-dot">✦</span>
            <span>Counter Network</span><span class="bt-ticker-dot">✦</span>
            <span>Driver Management</span><span class="bt-ticker-dot">✦</span>
            <span>SMS Confirmations</span><span class="bt-ticker-dot">✦</span>
            <span>Daily Financial Closing</span><span class="bt-ticker-dot">✦</span>
            <span>Revenue Reports</span><span class="bt-ticker-dot">✦</span>
            <span>Role-based Access</span><span class="bt-ticker-dot">✦</span>
            {{-- Duplicate for seamless loop --}}
            <span>{{ __('site.home_slider_bus_feature_1') }}</span><span class="bt-ticker-dot">✦</span>
            <span>Counter Network</span><span class="bt-ticker-dot">✦</span>
            <span>Driver Management</span><span class="bt-ticker-dot">✦</span>
            <span>SMS Confirmations</span><span class="bt-ticker-dot">✦</span>
            <span>Daily Financial Closing</span><span class="bt-ticker-dot">✦</span>
            <span>Revenue Reports</span><span class="bt-ticker-dot">✦</span>
            <span>Role-based Access</span><span class="bt-ticker-dot">✦</span>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    LIVE STATS
════════════════════════════════════════ --}}
<section class="bt-stats-section">
    <div class="container">
        <div class="bt-stats-grid">
            <div class="bt-stat-item reveal">
                <div class="bt-stat-num" data-count="50000">0</div>
                <div class="bt-stat-label">{{ __('site.bt_stats_label_1') }}</div>
            </div>
            <div class="bt-stat-item reveal reveal-delay-1">
                <div class="bt-stat-num" data-count="200">0</div>
                <div class="bt-stat-label">{{ __('site.bt_stats_label_2') }}</div>
            </div>
            <div class="bt-stat-item reveal reveal-delay-2">
                <div class="bt-stat-num" data-count="120">0</div>
                <div class="bt-stat-label">{{ __('site.bt_stats_label_3') }}</div>
            </div>
            <div class="bt-stat-item reveal reveal-delay-3">
                <div class="bt-stat-num" data-count="15">0</div>
                <div class="bt-stat-label">{{ __('site.bt_stats_label_4') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    HOW IT WORKS
════════════════════════════════════════ --}}
<section class="page-section" id="bt-features">
    <div class="container">
        <p class="section-eyebrow reveal">{{ __('site.bt_workflow_eyebrow') }}</p>
        <h2 class="section-title reveal">{{ __('site.bt_workflow_title') }}</h2>

        <div class="bt-how-grid">
            <div class="bt-how-card reveal">
                <div class="bt-how-step">01</div>
                <div class="bt-how-icon">
                    <svg viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="23" stroke="#ef1f1f" stroke-width="2" stroke-dasharray="6 4"/><path d="M16 24h16M24 16v16" stroke="#ef1f1f" stroke-width="2.5" stroke-linecap="round"/></svg>
                </div>
                <h3>{{ __('site.bt_step_1_title') }}</h3>
                <p>{{ __('site.bt_step_1_desc') }}</p>
            </div>
            <div class="bt-how-connector reveal reveal-delay-1">
                <div class="bt-connector-line"></div>
                <div class="bt-connector-arrow">→</div>
            </div>
            <div class="bt-how-card reveal reveal-delay-1">
                <div class="bt-how-step">02</div>
                <div class="bt-how-icon">
                    <svg viewBox="0 0 48 48" fill="none"><rect x="8" y="10" width="32" height="28" rx="4" stroke="#3a5de0" stroke-width="2"/><rect x="14" y="18" width="6" height="6" rx="1.5" fill="#3a5de0"/><rect x="22" y="18" width="6" height="6" rx="1.5" fill="#3a5de0"/><rect x="30" y="18" width="6" height="6" rx="1.5" fill="#e0e0e0"/><rect x="14" y="26" width="6" height="6" rx="1.5" fill="#e0e0e0"/><rect x="22" y="26" width="6" height="6" rx="1.5" fill="#3a5de0"/><rect x="30" y="26" width="6" height="6" rx="1.5" fill="#e0e0e0"/></svg>
                </div>
                <h3>{{ __('site.bt_step_2_title') }}</h3>
                <p>{{ __('site.bt_step_2_desc') }}</p>
            </div>
            <div class="bt-how-connector reveal reveal-delay-2">
                <div class="bt-connector-line"></div>
                <div class="bt-connector-arrow">→</div>
            </div>
            <div class="bt-how-card reveal reveal-delay-2">
                <div class="bt-how-step">03</div>
                <div class="bt-how-icon">
                    <svg viewBox="0 0 48 48" fill="none"><rect x="12" y="8" width="24" height="32" rx="3" stroke="#1a9e55" stroke-width="2"/><path d="M18 18h12M18 24h8" stroke="#1a9e55" stroke-width="2" stroke-linecap="round"/><rect x="18" y="29" width="12" height="6" rx="1.5" fill="#1a9e55" opacity="0.25"/><path d="M21 32h6" stroke="#1a9e55" stroke-width="2" stroke-linecap="round"/></svg>
                </div>
                <h3>{{ __('site.bt_step_3_title') }}</h3>
                <p>{{ __('site.bt_step_3_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    FEATURE DEEP DIVE
════════════════════════════════════════ --}}
<section class="page-section bt-features-section">
    <div class="container">
        <p class="section-eyebrow reveal">Full Platform</p>
        <h2 class="section-title reveal">Every module your operation needs</h2>
        <p class="section-lead reveal">
            Built from the ground up for Bangladesh's transport industry — with features
            we discovered by working closely with real bus operators.
        </p>

        <div class="bt-module-grid">

            <div class="bt-module-card bt-module-featured reveal">
                <div class="bt-module-icon-wrap" style="--mod-color:#ef1f1f;">
                    <svg viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14h20M14 4v20M7 7l14 14M21 7L7 21"/></svg>
                </div>
                <h3>{{ __('site.bt_module_1_title') }}</h3>
                <p>{{ __('site.bt_module_1_desc') }}</p>
                <ul class="bt-check-list">
                    <li>{{ __('site.bt_module_1_feature_1') }}</li>
                    <li>{{ __('site.bt_module_1_feature_2') }}</li>
                    <li>{{ __('site.bt_module_1_feature_3') }}</li>
                    <li>{{ __('site.bt_module_1_feature_4') }}</li>
                </ul>
            </div>

            <div class="bt-module-card reveal reveal-delay-1">
                <div class="bt-module-icon-wrap" style="--mod-color:#3a5de0;">
                    <svg viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="7" cy="20" r="3"/><circle cx="21" cy="20" r="3"/><rect x="1" y="8" width="22" height="9" rx="2"/><path d="M1 12h22"/></svg>
                </div>
                <h3>{{ __('site.bt_module_2_title') }}</h3>
                <p>{{ __('site.bt_module_2_desc') }}</p>
            </div>

            <div class="bt-module-card reveal reveal-delay-2">
                <div class="bt-module-icon-wrap" style="--mod-color:#1a9e55;">
                    <svg viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h20M4 14h20M4 22h12"/><circle cx="22" cy="22" r="4"/><path d="M22 20v2l1 1"/></svg>
                </div>
                <h3>{{ __('site.bt_module_3_title') }}</h3>
                <p>{{ __('site.bt_module_3_desc') }}</p>
            </div>

            <div class="bt-module-card reveal reveal-delay-1">
                <div class="bt-module-icon-wrap" style="--mod-color:#e06c25;">
                    <svg viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 24V8l10-4 10 4v16"/><path d="M10 24V16h8v8"/></svg>
                </div>
                <h3>{{ __('site.bt_module_4_title') }}</h3>
                <p>{{ __('site.bt_module_4_desc') }}</p>
            </div>

            <div class="bt-module-card reveal reveal-delay-2">
                <div class="bt-module-icon-wrap" style="--mod-color:#8b2de0;">
                    <svg viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4a10 10 0 100 20A10 10 0 0014 4z"/><path d="M14 8v6l4 2"/></svg>
                </div>
                <h3>{{ __('site.bt_module_5_title') }}</h3>
                <p>{{ __('site.bt_module_5_desc') }}</p>
            </div>

            <div class="bt-module-card reveal reveal-delay-3">
                <div class="bt-module-icon-wrap" style="--mod-color:#0e7bc4;">
                    <svg viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="22" height="18" rx="2"/><path d="M3 10h22M9 4v6M19 4v6"/></svg>
                </div>
                <h3>{{ __('site.bt_module_6_title') }}</h3>
                <p>{{ __('site.bt_module_6_desc') }}</p>
                <ul class="bt-check-list">
                    <li>{{ __('site.bt_module_6_feature_1') }}</li>
                    <li>{{ __('site.bt_module_6_feature_2') }}</li>
                    <li>{{ __('site.bt_module_6_feature_3') }}</li>
                </ul>
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    ROLE-BASED ACCESS BANDS
════════════════════════════════════════ --}}
<section class="page-section">
    <div class="container">
        <p class="section-eyebrow reveal">{{ __('site.bt_roles_eyebrow') }}</p>
        <h2 class="section-title reveal">{{ __('site.bt_roles_title') }}</h2>

        <div class="bt-roles-grid">
            <div class="bt-role-card reveal">
                <div class="bt-role-badge" style="background:#fff0f0;border-color:#ffc5c5;color:#c42020;">Admin</div>
                <h3>{{ __('site.bt_role_admin') }}</h3>
                <ul class="bt-check-list">
                    <li>{{ __('site.bt_role_admin_feature_1') }}</li>
                    <li>{{ __('site.bt_role_admin_feature_2') }}</li>
                    <li>{{ __('site.bt_role_admin_feature_3') }}</li>
                    <li>{{ __('site.bt_role_admin_feature_4') }}</li>
                    <li>{{ __('site.bt_role_admin_feature_5') }}</li>
                </ul>
            </div>
            <div class="bt-role-card reveal reveal-delay-1">
                <div class="bt-role-badge" style="background:#f0f4ff;border-color:#c5d2ff;color:#2040c4;">Manager</div>
                <h3>{{ __('site.bt_role_manager') }}</h3>
                <ul class="bt-check-list">
                    <li>{{ __('site.bt_role_manager_feature_1') }}</li>
                    <li>{{ __('site.bt_role_manager_feature_2') }}</li>
                    <li>{{ __('site.bt_role_manager_feature_3') }}</li>
                    <li>{{ __('site.bt_role_manager_feature_4') }}</li>
                    <li>{{ __('site.bt_role_manager_feature_5') }}</li>
                </ul>
            </div>
            <div class="bt-role-card reveal reveal-delay-2">
                <div class="bt-role-badge" style="background:#f0fff6;border-color:#b8edcd;color:#1a7a45;">Counter</div>
                <h3>{{ __('site.bt_role_staff') }}</h3>
                <ul class="bt-check-list">
                    <li>{{ __('site.bt_role_staff_feature_1') }}</li>
                    <li>{{ __('site.bt_role_staff_feature_2') }}</li>
                    <li>{{ __('site.bt_role_staff_feature_3') }}</li>
                    <li>{{ __('site.bt_role_staff_feature_4') }}</li>
                    <li>{{ __('site.bt_role_staff_feature_5') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    REPORTING STRIP
════════════════════════════════════════ --}}
<section class="bt-report-strip">
    <div class="container">
        <div class="bt-report-inner reveal">
            <div class="bt-report-copy">
                <p class="section-eyebrow" style="color:rgba(255,255,255,0.7);">{{ __('site.bt_analytics_eyebrow') }}</p>
                <h2 style="color:#fff;font-size:clamp(1.4rem,3vw,2rem);font-weight:800;margin:0 0 12px;">{{ __('site.bt_analytics_title') }}</h2>
                <p style="color:rgba(255,255,255,0.8);line-height:1.7;margin:0;">
                    {{ __('site.bt_analytics_lead') }}
                </p>
            </div>
            <div class="bt-report-chips">
                <div class="bt-rep-chip">{{ __('site.bt_analytics_chip_1') }}</div>
                <div class="bt-rep-chip">{{ __('site.bt_analytics_chip_2') }}</div>
                <div class="bt-rep-chip">{{ __('site.bt_analytics_chip_3') }}</div>
                <div class="bt-rep-chip">{{ __('site.bt_analytics_chip_4') }}</div>
                <div class="bt-rep-chip">{{ __('site.bt_analytics_chip_5') }}</div>
                <div class="bt-rep-chip">{{ __('site.bt_analytics_chip_6') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
    CTA
════════════════════════════════════════ --}}
<section class="page-section">
    <div class="container">
        <div class="product-cta reveal">
            <h2>{{ __('site.bt_cta_section_title') }}</h2>
            <p>{{ __('site.bt_cta_section_lead') }}</p>
            <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('contact') }}" class="btn-white">{{ __('site.bt_cta_demo_btn') }}</a>
                <a href="{{ route('contact') }}" class="btn-ghost">{{ __('site.bt_cta_sales_btn') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
