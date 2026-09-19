@extends('layouts.app')

@section('content')

{{-- ── TERMS HERO ──────────────────────────────────────────────────── --}}
<section class="legal-hero">
    <div class="container legal-hero-inner">
        <span class="legal-kicker">{{ __('site.terms_kicker') }}</span>
        <h1>{{ __('site.terms_title') }}</h1>
        <p class="legal-lead">{{ __('site.terms_lead') }}</p>
        <p class="legal-meta">{{ __('site.terms_meta_updated') }} <strong>April 5, 2026</strong> &nbsp;·&nbsp; {{ __('site.terms_meta_effective') }} <strong>January 1, 2012</strong></p>
    </div>
</section>

{{-- ── TERMS CONTENT ───────────────────────────────────────────────── --}}
<section class="legal-body">
    <div class="container legal-layout">

        {{-- Sticky nav sidebar --}}
        <nav class="legal-nav" aria-label="Terms sections">
            <p class="legal-nav-title">{{ __('site.terms_nav_title') }}</p>
            <a href="#acceptance">1. {{ __('site.terms_section_01') }}</a>
            <a href="#products">2. {{ __('site.terms_section_02') }}</a>
            <a href="#accounts">3. {{ __('site.terms_section_03') }}</a>
            <a href="#license">4. {{ __('site.terms_section_04') }}</a>
            <a href="#payment">5. {{ __('site.terms_section_05') }}</a>
            <a href="#data">6. {{ __('site.terms_section_06') }}</a>
            <a href="#ip">7. {{ __('site.terms_section_07') }}</a>
            <a href="#liability">8. {{ __('site.terms_section_08') }}</a>
            <a href="#termination">9. {{ __('site.terms_section_09') }}</a>
            <a href="#governing">10. {{ __('site.terms_section_10') }}</a>
            <a href="#changes">11. {{ __('site.terms_section_11') }}</a>
            <a href="#contact">12. {{ __('site.terms_section_12') }}</a>
        </nav>

        {{-- Main content --}}
        <article class="legal-content">

            <div class="legal-section" id="acceptance">
                <h2><span class="legal-num">01</span> {{ __('site.terms_section_01') }}</h2>
                <p>{{ __('site.terms_content_01_p1') }}</p>
                <p>{{ __('site.terms_content_01_p2') }}</p>
                <p>{{ __('site.terms_content_01_p3') }}</p>
            </div>

            <div class="legal-section" id="products">
                <h2><span class="legal-num">02</span> {{ __('site.terms_section_02') }}</h2>
                <p>{{ __('site.terms_content_02_intro') }}</p>
                <ul>
                    <li>
                        <strong>{{ __('site.terms_content_02_bullet_1_name') }}</strong> - {{ __('site.terms_content_02_bullet_1_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.terms_content_02_bullet_2_name') }}</strong> - {{ __('site.terms_content_02_bullet_2_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.terms_content_02_bullet_3_name') }}</strong> - {{ __('site.terms_content_02_bullet_3_desc') }}
                    </li>
                </ul>
                <p>{{ __('site.terms_content_02_p1') }}</p>
            </div>

            <div class="legal-section" id="accounts">
                <h2><span class="legal-num">03</span> {{ __('site.terms_section_03') }}</h2>
                <p>{{ __('site.terms_content_03_intro') }}</p>
                <ul>
                    <li>{{ __('site.terms_content_03_bullet_1') }}</li>
                    <li>{{ __('site.terms_content_03_bullet_2') }}</li>
                    <li>{{ __('site.terms_content_03_bullet_3') }}</li>
                    <li>{{ __('site.terms_content_03_bullet_4_prefix') }} <strong>{{ config('regal.email') }}</strong> {{ __('site.terms_content_03_bullet_4_suffix') }}</li>
                </ul>
                <p>{{ __('site.terms_content_03_p1') }}</p>
            </div>

            <div class="legal-section" id="license">
                <h2><span class="legal-num">04</span> {{ __('site.terms_section_04') }}</h2>
                <p>{{ __('site.terms_content_04_p1') }}</p>
                <p><strong>{{ __('site.terms_content_04_section_header') }}</strong></p>
                <ul>
                    <li>{{ __('site.terms_content_04_bullet_1') }}</li>
                    <li>{{ __('site.terms_content_04_bullet_2') }}</li>
                    <li>{{ __('site.terms_content_04_bullet_3') }}</li>
                    <li>{{ __('site.terms_content_04_bullet_4') }}</li>
                    <li>{{ __('site.terms_content_04_bullet_5') }}</li>
                    <li>{{ __('site.terms_content_04_bullet_6') }}</li>
                </ul>
            </div>

            <div class="legal-section" id="payment">
                <h2><span class="legal-num">05</span> {{ __('site.terms_section_05') }}</h2>
                <p>{{ __('site.terms_content_05_intro') }}</p>
                <ul>
                    <li>{{ __('site.terms_content_05_bullet_1') }}</li>
                    <li>{{ __('site.terms_content_05_bullet_2') }}</li>
                    <li>{{ __('site.terms_content_05_bullet_3') }}</li>
                    <li>{{ __('site.terms_content_05_bullet_4') }}</li>
                    <li>{{ __('site.terms_content_05_bullet_5') }}</li>
                </ul>
                <p>
                    {{ __('site.terms_content_05_contact_prefix') }}
                    <a href="mailto:{{ config('regal.email') }}">{{ config('regal.email') }}</a>.
                </p>
            </div>

            <div class="legal-section" id="data">
                <h2><span class="legal-num">06</span> {{ __('site.terms_section_06') }}</h2>
                <p>{{ __('site.terms_content_06_intro') }}</p>
                <ul>
                    <li>{{ __('site.terms_content_06_bullet_1') }}</li>
                    <li>{{ __('site.terms_content_06_bullet_2') }}</li>
                    <li>{{ __('site.terms_content_06_bullet_3') }}</li>
                    <li>{{ __('site.terms_content_06_bullet_4') }}</li>
                </ul>
                <p>
                    {{ __('site.terms_content_06_p1_prefix') }}
                    <a href="{{ route('privacy') }}">{{ __('site.terms_content_06_privacy_link') }}</a>{{ __('site.terms_content_06_p1_suffix') }}
                </p>
            </div>

            <div class="legal-section" id="ip">
                <h2><span class="legal-num">07</span> {{ __('site.terms_section_07') }}</h2>
                <p>{{ __('site.terms_content_07_p1') }}</p>
                <p>{{ __('site.terms_content_07_p2') }}</p>
            </div>

            <div class="legal-section" id="liability">
                <h2><span class="legal-num">08</span> {{ __('site.terms_section_08') }}</h2>
                <p>{{ __('site.terms_content_08_p1') }}</p>
                <p>{{ __('site.terms_content_08_p2') }}</p>
                <p>{{ __('site.terms_content_08_p3_prefix') }} <strong>"as is"</strong> {{ __('site.terms_content_08_p3_middle') }} <strong>"as available"</strong> {{ __('site.terms_content_08_p3_suffix') }}</p>
            </div>

            <div class="legal-section" id="termination">
                <h2><span class="legal-num">09</span> {{ __('site.terms_section_09') }}</h2>
                <p>{{ __('site.terms_content_09_intro') }}</p>
                <p>{{ __('site.terms_content_09_bullet_intro') }}</p>
                <ul>
                    <li>{{ __('site.terms_content_09_bullet_1') }}</li>
                    <li>{{ __('site.terms_content_09_bullet_2') }}</li>
                    <li>{{ __('site.terms_content_09_bullet_3') }}</li>
                </ul>
                <p>{{ __('site.terms_content_09_p1') }}</p>
            </div>

            <div class="legal-section" id="governing">
                <h2><span class="legal-num">10</span> {{ __('site.terms_section_10') }}</h2>
                <p>{{ __('site.terms_content_10_p1_prefix') }} <strong>{{ __('site.terms_content_10_country') }}</strong>{{ __('site.terms_content_10_p1_suffix') }}</p>
                <p>{{ __('site.terms_content_10_p2') }}</p>
            </div>

            <div class="legal-section" id="changes">
                <h2><span class="legal-num">11</span> {{ __('site.terms_section_11') }}</h2>
                <p>{{ __('site.terms_content_11_p1') }}</p>
                <p>{{ __('site.terms_content_11_p2') }}</p>
            </div>

            <div class="legal-section" id="contact">
                <h2><span class="legal-num">12</span> {{ __('site.terms_section_12') }}</h2>
                <p>{{ __('site.terms_content_12_intro') }}</p>
                <div class="legal-contact-box">
                    <strong>{{ __('site.terms_content_12_company') }}</strong><br>
                    {{ config('regal.office_address') }}<br>
                    📞 <a href="tel:{{ config('regal.phone') }}">{{ config('regal.phone') }}</a><br>
                    ✉️ <a href="mailto:{{ config('regal.email') }}">{{ config('regal.email') }}</a><br>
                    💬 <a href="{{ config('regal.whatsapp_link') }}" target="_blank" rel="noopener">{{ __('site.terms_content_12_whatsapp') }}</a>
                </div>
            </div>

        </article>
    </div>
</section>

@endsection

