@extends('layouts.app')

@section('content')

{{-- ════════════════════════════════════════
    HERO WITH FLOATING ELEMENTS
════════════════════════════════════════ --}}
<section class="hero">
    <div class="hero-orb hero-orb-a" aria-hidden="true"></div>
    <div class="hero-orb hero-orb-b" aria-hidden="true"></div>
    
    {{-- Floating tech cards --}}
    <div class="hero-float hero-float-1">
        <div class="float-card">
            <span class="float-icon">⚡</span>
            <span class="float-label">50K+ Users</span>
        </div>
    </div>
    <div class="hero-float hero-float-2">
        <div class="float-card">
            <span class="float-icon">🚀</span>
            <span class="float-label">200+ Routes</span>
        </div>
    </div>
    <div class="hero-float hero-float-3">
        <div class="float-card">
            <span class="float-icon">✨</span>
            <span class="float-label">Live Dashboard</span>
        </div>
    </div>

    <div class="container hero-grid">
        <div class="hero-copy reveal">
            <p class="kicker">{{ __('site.hero_kicker') }}</p>
            <h1 class="hero-title-animate">{{ $homeTitle }}</h1>
            <p class="lead">{{ $homeBody }}</p>
            <div class="cta-row">
                <a class="btn btn-primary" href="#products">{{ __('site.home_explore_products') }}</a>
                <a class="btn btn-outline" href="{{ route('contact') }}">{{ __('site.cta_contact') }}</a>
            </div>
        </div>
        <div class="hero-card automation-visual reveal reveal-delay-1">
            <div class="automation-grid" aria-hidden="true"></div>
            <div class="automation-head">
                <span class="automation-kicker">Automation Engine</span>
                <h3>One intelligent flow powering every software platform</h3>
            </div>

            <div class="automation-stage">
                <div class="automation-node automation-node-source automation-node-pos">
                    <strong>POS</strong>
                    <span>Sales & stock events</span>
                </div>
                <div class="automation-node automation-node-source automation-node-erp">
                    <strong>ERP</strong>
                    <span>HR, finance, workflow data</span>
                </div>
                <div class="automation-node automation-node-source automation-node-bus">
                    <strong>Bus Ticket</strong>
                    <span>Trips, bookings, counters</span>
                </div>

                <div class="automation-core">
                    <div class="automation-core-ring"></div>
                    <div class="automation-core-body">
                        <span class="automation-core-badge">Regal Core</span>
                        <strong>Automate. Sync. Analyze.</strong>
                        <small>Rules engine, alerts, dashboards, and reporting</small>
                    </div>
                </div>

                <div class="automation-node automation-node-output automation-node-output-a">
                    <strong>Live Dashboard</strong>
                    <span>KPIs in real time</span>
                </div>
                <div class="automation-node automation-node-output automation-node-output-b">
                    <strong>Alerts & Actions</strong>
                    <span>Approvals, SMS, tasks</span>
                </div>
                <div class="automation-node automation-node-output automation-node-output-c">
                    <strong>Reports</strong>
                    <span>Decisions with clarity</span>
                </div>

                <div class="automation-line automation-line-pos"></div>
                <div class="automation-line automation-line-erp"></div>
                <div class="automation-line automation-line-bus"></div>
                <div class="automation-line automation-line-out-a"></div>
                <div class="automation-line automation-line-out-b"></div>
                <div class="automation-line automation-line-out-c"></div>
            </div>

            <div class="automation-status-row">
                <span class="automation-pill">Inventory Sync</span>
                <span class="automation-pill">Instant Reports</span>
                <span class="automation-pill">Approval Workflow</span>
                <span class="automation-pill">QR & SMS</span>
            </div>
        </div>
    </div>

    <div class="container product-row" id="products">
        <a class="product-pill reveal product-link-card product-showcase-card product-theme-pos" href="{{ route('pos') }}">
            <div class="product-card-top">
                <span class="product-chip">{{ __('site.home_product_pos_chip') }}</span>
                <span class="product-mini-stat">{{ __('site.home_product_pos_stat') }}</span>
            </div>
            <div class="product-icon-wrap">PO</div>
            <h4>{{ __('site.home_product_pos_name') }}</h4>
            <p>{{ __('site.home_product_pos_desc') }}</p>
            <ul class="product-feature-list">
                <li>{{ __('site.home_product_pos_feature_1') }}</li>
                <li>{{ __('site.home_product_pos_feature_2') }}</li>
                <li>{{ __('site.home_product_pos_feature_3') }}</li>
            </ul>
            <span class="product-link-arrow">{{ __('site.home_product_pos_link') }}</span>
        </a>
        <a class="product-pill reveal reveal-delay-1 product-link-card product-showcase-card product-theme-erp" href="{{ route('erp') }}">
            <div class="product-card-top">
                <span class="product-chip">{{ __('site.home_product_erp_chip') }}</span>
                <span class="product-mini-stat">{{ __('site.home_product_erp_stat') }}</span>
            </div>
            <div class="product-icon-wrap">ER</div>
            <h4>{{ __('site.home_product_erp_name') }}</h4>
            <p>{{ __('site.home_product_erp_desc') }}</p>
            <ul class="product-feature-list">
                <li>{{ __('site.home_product_erp_feature_1') }}</li>
                <li>{{ __('site.home_product_erp_feature_2') }}</li>
                <li>{{ __('site.home_product_erp_feature_3') }}</li>
            </ul>
            <span class="product-link-arrow">{{ __('site.home_product_erp_link') }}</span>
        </a>
        <a class="product-pill reveal reveal-delay-2 product-link-card product-showcase-card product-theme-bus" href="{{ route('bus-ticket') }}">
            <div class="product-card-top">
                <span class="product-chip">{{ __('site.home_product_bus_chip') }}</span>
                <span class="product-mini-stat">{{ __('site.home_product_bus_stat') }}</span>
            </div>
            <div class="product-icon-wrap">BT</div>
            <h4>{{ __('site.home_product_bus_name') }}</h4>
            <p>{{ __('site.home_product_bus_desc') }}</p>
            <ul class="product-feature-list">
                <li>{{ __('site.home_product_bus_feature_1') }}</li>
                <li>{{ __('site.home_product_bus_feature_2') }}</li>
                <li>{{ __('site.home_product_bus_feature_3') }}</li>
            </ul>
            <span class="product-link-arrow">{{ __('site.home_product_bus_link') }}</span>
        </a>
    </div>
</section>

{{-- ════════════════════════════════════════
    SOFTWARE SPOTLIGHT SLIDER
════════════════════════════════════════ --}}
<section class="software-slider-section">
    <div class="container">
        <div class="software-slider-header reveal">
            <p class="section-eyebrow">{{ __('site.home_slider_header_eyebrow') }}</p>
            <h2>{{ __('site.home_slider_header_title') }}</h2>
            <p>{{ __('site.home_slider_header_lead') }}</p>
        </div>

        <div class="software-slider reveal reveal-delay-1" data-software-slider>
            <div class="software-slider-toolbar">
                <div class="software-slider-progress">
                    <span class="software-slider-label">{{ __('site.home_slider_label') }}</span>
                    <div class="software-slider-dots" role="tablist" aria-label="Software slides">
                        <button class="software-dot is-active" type="button" aria-label="Show POS slide" data-slide-to="0"></button>
                        <button class="software-dot" type="button" aria-label="Show ERP slide" data-slide-to="1"></button>
                        <button class="software-dot" type="button" aria-label="Show Bus Ticket slide" data-slide-to="2"></button>
                    </div>
                </div>
                <div class="software-slider-nav">
                    <button class="software-nav-btn" type="button" aria-label="Previous slide" data-slide-prev>{{ __('site.home_slider_prev') }}</button>
                    <button class="software-nav-btn" type="button" aria-label="Next slide" data-slide-next>{{ __('site.home_slider_next') }}</button>
                </div>
            </div>

            <div class="software-slider-stage">
                <article class="software-slide is-active software-slide-pos" data-slide>
                    <div class="software-slide-copy">
                        <span class="software-slide-badge">{{ __('site.home_slider_pos_badge') }}</span>
                        <h3>{{ __('site.home_slider_pos_title') }}</h3>
                        <p>{{ __('site.home_slider_pos_desc') }}</p>
                        <ul class="software-feature-list">
                            <li>{{ __('site.home_slider_pos_feature_1') }}</li>
                            <li>{{ __('site.home_slider_pos_feature_2') }}</li>
                            <li>{{ __('site.home_slider_pos_feature_3') }}</li>
                        </ul>
                        <div class="software-slide-meta">
                            <span>{{ __('site.home_slider_pos_meta_1') }}</span>
                            <span>{{ __('site.home_slider_pos_meta_2') }}</span>
                            <span>{{ __('site.home_slider_pos_meta_3') }}</span>
                        </div>
                        <a class="product-link-arrow" href="{{ route('pos') }}">{{ __('site.home_slider_pos_link') }}</a>
                    </div>
                    <div class="software-slide-visual">
                        <div class="software-visual-card">
                            <div class="software-visual-row">
                                <span class="software-visual-kpi">{{ __('site.home_slider_pos_kpi') }}</span>
                                <strong>BDT 128,450</strong>
                            </div>
                            <div class="software-visual-bars">
                                <span style="--bar:82%"></span>
                                <span style="--bar:54%"></span>
                                <span style="--bar:68%"></span>
                                <span style="--bar:92%"></span>
                                <span style="--bar:74%"></span>
                            </div>
                            <div class="software-visual-tags">
                                <span>{{ __('site.home_slider_pos_inventory') }}</span>
                                <span>{{ __('site.home_slider_pos_billing') }}</span>
                                <span>{{ __('site.home_slider_pos_loyalty') }}</span>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="software-slide software-slide-erp" data-slide>
                    <div class="software-slide-copy">
                        <span class="software-slide-badge">{{ __('site.home_slider_erp_badge') }}</span>
                        <h3>{{ __('site.home_slider_erp_title') }}</h3>
                        <p>{{ __('site.home_slider_erp_desc') }}</p>
                        <ul class="software-feature-list">
                            <li>{{ __('site.home_slider_erp_feature_1') }}</li>
                            <li>{{ __('site.home_slider_erp_feature_2') }}</li>
                            <li>{{ __('site.home_slider_erp_feature_3') }}</li>
                        </ul>
                        <div class="software-slide-meta">
                            <span>{{ __('site.home_slider_erp_meta_1') }}</span>
                            <span>{{ __('site.home_slider_erp_meta_2') }}</span>
                            <span>{{ __('site.home_slider_erp_meta_3') }}</span>
                        </div>
                        <a class="product-link-arrow" href="{{ route('erp') }}">{{ __('site.home_slider_erp_link') }}</a>
                    </div>
                    <div class="software-slide-visual">
                        <div class="software-visual-card software-visual-grid-card">
                            <div class="software-module-box">{{ __('site.home_slider_erp_finance') }}</div>
                            <div class="software-module-box">{{ __('site.home_slider_erp_hr') }}</div>
                            <div class="software-module-box">{{ __('site.home_slider_erp_inventory') }}</div>
                            <div class="software-module-box">{{ __('site.home_slider_erp_procurement') }}</div>
                            <div class="software-module-box">{{ __('site.home_slider_erp_crm') }}</div>
                            <div class="software-module-box">{{ __('site.home_slider_erp_reports') }}</div>
                        </div>
                    </div>
                </article>

                <article class="software-slide software-slide-bus" data-slide>
                    <div class="software-slide-copy">
                        <span class="software-slide-badge">{{ __('site.home_slider_bus_badge') }}</span>
                        <h3>{{ __('site.home_slider_bus_title') }}</h3>
                        <p>{{ __('site.home_slider_bus_desc') }}</p>
                        <ul class="software-feature-list">
                            <li>{{ __('site.home_slider_bus_feature_1') }}</li>
                            <li>{{ __('site.home_slider_bus_feature_2') }}</li>
                            <li>{{ __('site.home_slider_bus_feature_3') }}</li>
                        </ul>
                        <div class="software-slide-meta">
                            <span>{{ __('site.home_slider_bus_meta_1') }}</span>
                            <span>{{ __('site.home_slider_bus_meta_2') }}</span>
                            <span>{{ __('site.home_slider_bus_meta_3') }}</span>
                        </div>
                        <a class="product-link-arrow" href="{{ route('bus-ticket') }}">{{ __('site.home_slider_bus_link') }}</a>
                    </div>
                    <div class="software-slide-visual">
                        <div class="software-visual-card software-seat-card">
                            <div class="software-seat-grid">
                                <span class="seat taken"></span>
                                <span class="seat taken"></span>
                                <span class="seat free"></span>
                                <span class="seat free"></span>
                                <span class="seat free"></span>
                                <span class="seat taken"></span>
                                <span class="seat free"></span>
                                <span class="seat free"></span>
                                <span class="seat free"></span>
                                <span class="seat taken"></span>
                                <span class="seat free"></span>
                                <span class="seat free"></span>
                            </div>
                            <div class="software-visual-tags">
                                <span>{{ __('site.home_slider_bus_route_live') }}</span>
                                <span>{{ __('site.home_slider_bus_qr_ticket') }}</span>
                                <span>{{ __('site.home_slider_bus_counter_sync') }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
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

        {{-- Stats grid --}}
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
                <p class="testimonial-text">
                    "{{ __('site.home_testimonial_1_text') }}"
                </p>
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
                <p class="testimonial-text">
                    "{{ __('site.home_testimonial_2_text') }}"
                </p>
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
                <p class="testimonial-text">
                    "{{ __('site.home_testimonial_3_text') }}"
                </p>
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
                <p class="testimonial-text">
                    "{{ __('site.home_testimonial_4_text') }}"
                </p>
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
                <p class="testimonial-text">
                    "{{ __('site.home_testimonial_5_text') }}"
                </p>
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
                <p class="testimonial-text">
                    "{{ __('site.home_testimonial_6_text') }}"
                </p>
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
                <a href="#products" class="btn btn-ghost-white">{{ __('site.cta_band_btn_products') }}</a>
            </div>
        </div>
</section>

@endsection
