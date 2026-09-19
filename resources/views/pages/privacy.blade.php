@extends('layouts.app')

@section('content')

{{-- ── PRIVACY HERO ─────────────────────────────────────────────────── --}}
<section class="legal-hero">
    <div class="container legal-hero-inner">
        <span class="legal-kicker">{{ __('site.privacy_kicker') }}</span>
        <h1>{{ __('site.privacy_title') }}</h1>
        <p class="legal-lead">{{ __('site.privacy_lead') }}</p>
        <p class="legal-meta">{{ __('site.privacy_meta_updated') }} <strong>April 5, 2026</strong> &nbsp;·&nbsp; {{ __('site.privacy_meta_effective') }} <strong>January 1, 2024</strong></p>
    </div>
</section>

{{-- ── PRIVACY CONTENT ──────────────────────────────────────────────── --}}
<section class="legal-body">
    <div class="container legal-layout">

        {{-- Sticky sidebar nav --}}
        <nav class="legal-nav" aria-label="Privacy sections">
            <p class="legal-nav-title">{{ __('site.privacy_nav_title') }}</p>
            <a href="#who-we-are">1. {{ __('site.privacy_section_01') }}</a>
            <a href="#data-collected">2. {{ __('site.privacy_section_02') }}</a>
            <a href="#how-we-use">3. {{ __('site.privacy_section_03') }}</a>
            <a href="#legal-basis">4. {{ __('site.privacy_section_04') }}</a>
            <a href="#sharing">5. {{ __('site.privacy_section_05') }}</a>
            <a href="#retention">6. {{ __('site.privacy_section_06') }}</a>
            <a href="#security">7. {{ __('site.privacy_section_07') }}</a>
            <a href="#cookies">8. {{ __('site.privacy_section_08') }}</a>
            <a href="#rights">9. {{ __('site.privacy_section_09') }}</a>
            <a href="#children">10. {{ __('site.privacy_section_10') }}</a>
            <a href="#international">11. {{ __('site.privacy_section_11') }}</a>
            <a href="#changes">12. {{ __('site.privacy_section_12') }}</a>
            <a href="#contact-dpo">13. {{ __('site.privacy_section_13') }}</a>
        </nav>

        {{-- Main content --}}
        <article class="legal-content">

            <div class="legal-section" id="who-we-are">
                <h2><span class="legal-num">01</span> {{ __('site.privacy_section_01') }}</h2>
                <p>{{ __('site.privacy_content_01_p1') }}</p>
                <p>
                    {{ __('site.privacy_content_01_p2_prefix') }}
                    <strong>{{ __('site.privacy_content_01_p2_strong') }}</strong>
                    {{ __('site.privacy_content_01_p2_suffix') }}
                </p>
                <div class="legal-contact-box">
                    <strong>{{ __('site.privacy_content_01_contact_title') }}</strong><br>
                    {{ config('regal.office_address') }}<br>
                    ✉️ <a href="mailto:{{ config('regal.email') }}">{{ config('regal.email') }}</a>
                </div>
            </div>

            <div class="legal-section" id="data-collected">
                <h2><span class="legal-num">02</span> {{ __('site.privacy_section_02') }}</h2>
                <p>{{ __('site.privacy_content_02_intro') }}</p>

                <h3 class="legal-subhead">{{ __('site.privacy_content_02_subhead_1') }}</h3>
                <ul>
                    <li>{{ __('site.privacy_content_02_b1') }}</li>
                    <li>{{ __('site.privacy_content_02_b2') }}</li>
                    <li>{{ __('site.privacy_content_02_b3') }}</li>
                    <li>{{ __('site.privacy_content_02_b4') }}</li>
                </ul>

                <h3 class="legal-subhead">{{ __('site.privacy_content_02_subhead_2') }}</h3>
                <ul>
                    <li>{{ __('site.privacy_content_02_b5') }}</li>
                    <li>{{ __('site.privacy_content_02_b6') }}</li>
                    <li>
                        {{ __('site.privacy_content_02_b7_prefix') }}
                        <a href="{{ route('terms') }}">{{ __('site.privacy_content_02_b7_link') }}</a>{{ __('site.privacy_content_02_b7_suffix') }}
                    </li>
                </ul>

                <h3 class="legal-subhead">{{ __('site.privacy_content_02_subhead_3') }}</h3>
                <ul>
                    <li>{{ __('site.privacy_content_02_b8') }}</li>
                    <li>{{ __('site.privacy_content_02_b9') }}</li>
                    <li>{{ __('site.privacy_content_02_b10') }}</li>
                </ul>
            </div>

            <div class="legal-section" id="how-we-use">
                <h2><span class="legal-num">03</span> {{ __('site.privacy_section_03') }}</h2>
                <p>{{ __('site.privacy_content_03_intro') }}</p>
                <ul>
                    <li><strong>{{ __('site.privacy_content_03_b1_title') }}</strong> — {{ __('site.privacy_content_03_b1_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b2_title') }}</strong> — {{ __('site.privacy_content_03_b2_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b3_title') }}</strong> — {{ __('site.privacy_content_03_b3_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b4_title') }}</strong> — {{ __('site.privacy_content_03_b4_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b5_title') }}</strong> — {{ __('site.privacy_content_03_b5_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b6_title') }}</strong> — {{ __('site.privacy_content_03_b6_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b7_title') }}</strong> — {{ __('site.privacy_content_03_b7_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_03_b8_title') }}</strong> — {{ __('site.privacy_content_03_b8_desc') }}</li>
                </ul>
                <p>{{ __('site.privacy_content_03_p1') }}</p>
            </div>

            <div class="legal-section" id="legal-basis">
                <h2><span class="legal-num">04</span> {{ __('site.privacy_section_04') }}</h2>
                <p>{{ __('site.privacy_content_04_intro') }}</p>
                <ul>
                    <li><strong>{{ __('site.privacy_content_04_b1_title') }}</strong> — {{ __('site.privacy_content_04_b1_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_04_b2_title') }}</strong> — {{ __('site.privacy_content_04_b2_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_04_b3_title') }}</strong> — {{ __('site.privacy_content_04_b3_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_04_b4_title') }}</strong> — {{ __('site.privacy_content_04_b4_desc') }}</li>
                </ul>
            </div>

            <div class="legal-section" id="sharing">
                <h2><span class="legal-num">05</span> {{ __('site.privacy_section_05') }}</h2>
                <p>
                    {{ __('site.privacy_content_05_intro_prefix') }}
                    <strong>{{ __('site.privacy_content_05_intro_strong') }}</strong>
                    {{ __('site.privacy_content_05_intro_suffix') }}
                </p>
                <ul>
                    <li>
                        <strong>{{ __('site.privacy_content_05_b1_title') }}</strong> — {{ __('site.privacy_content_05_b1_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.privacy_content_05_b2_title') }}</strong> — {{ __('site.privacy_content_05_b2_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.privacy_content_05_b3_title') }}</strong> — {{ __('site.privacy_content_05_b3_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.privacy_content_05_b4_title') }}</strong> — {{ __('site.privacy_content_05_b4_desc') }}
                    </li>
                </ul>
            </div>

            <div class="legal-section" id="retention">
                <h2><span class="legal-num">06</span> {{ __('site.privacy_section_06') }}</h2>
                <p>{{ __('site.privacy_content_06_p1') }}</p>
                <ul>
                    <li>{{ __('site.privacy_content_06_b1_prefix') }} <strong>{{ __('site.privacy_content_06_b1_strong') }}</strong> {{ __('site.privacy_content_06_b1_suffix') }}</li>
                    <li>{{ __('site.privacy_content_06_b2_prefix') }} <strong>{{ __('site.privacy_content_06_b2_strong') }}</strong> {{ __('site.privacy_content_06_b2_suffix') }}</li>
                    <li>{{ __('site.privacy_content_06_b3_prefix') }} <strong>{{ __('site.privacy_content_06_b3_strong') }}</strong> {{ __('site.privacy_content_06_b3_suffix') }}</li>
                    <li>{{ __('site.privacy_content_06_b4_prefix') }} <strong>{{ __('site.privacy_content_06_b4_strong') }}</strong> {{ __('site.privacy_content_06_b4_suffix') }}</li>
                </ul>
                <p>{{ __('site.privacy_content_06_p2') }}</p>
            </div>

            <div class="legal-section" id="security">
                <h2><span class="legal-num">07</span> {{ __('site.privacy_section_07') }}</h2>
                <p>{{ __('site.privacy_content_07_p1') }}</p>
                <ul>
                    <li>{{ __('site.privacy_content_07_b1') }}</li>
                    <li>{{ __('site.privacy_content_07_b2') }}</li>
                    <li>{{ __('site.privacy_content_07_b3') }}</li>
                    <li>{{ __('site.privacy_content_07_b4') }}</li>
                    <li>{{ __('site.privacy_content_07_b5') }}</li>
                </ul>
                <p>{{ __('site.privacy_content_07_p2') }}</p>
            </div>

            <div class="legal-section" id="cookies">
                <h2><span class="legal-num">08</span> {{ __('site.privacy_section_08') }}</h2>
                <p>{{ __('site.privacy_content_08_p1') }}</p>
                <ul>
                    <li>
                        <strong>{{ __('site.privacy_content_08_b1_title') }}</strong> — {{ __('site.privacy_content_08_b1_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.privacy_content_08_b2_title') }}</strong> — {{ __('site.privacy_content_08_b2_desc') }}
                    </li>
                    <li>
                        <strong>{{ __('site.privacy_content_08_b3_title') }}</strong> — {{ __('site.privacy_content_08_b3_desc') }}
                    </li>
                </ul>
                <p>{{ __('site.privacy_content_08_p2') }}</p>
            </div>

            <div class="legal-section" id="rights">
                <h2><span class="legal-num">09</span> {{ __('site.privacy_section_09') }}</h2>
                <p>{{ __('site.privacy_content_09_p1') }}</p>
                <ul>
                    <li><strong>{{ __('site.privacy_content_09_b1_title') }}</strong> — {{ __('site.privacy_content_09_b1_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_09_b2_title') }}</strong> — {{ __('site.privacy_content_09_b2_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_09_b3_title') }}</strong> — {{ __('site.privacy_content_09_b3_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_09_b4_title') }}</strong> — {{ __('site.privacy_content_09_b4_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_09_b5_title') }}</strong> — {{ __('site.privacy_content_09_b5_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_09_b6_title') }}</strong> — {{ __('site.privacy_content_09_b6_desc') }}</li>
                    <li><strong>{{ __('site.privacy_content_09_b7_title') }}</strong> — {{ __('site.privacy_content_09_b7_desc') }}</li>
                </ul>
                <p>
                    {{ __('site.privacy_content_09_p2_prefix') }}
                    <a href="mailto:{{ config('regal.email') }}">{{ config('regal.email') }}</a>{{ __('site.privacy_content_09_p2_suffix') }} <strong>{{ __('site.privacy_content_09_p2_strong') }}</strong>{{ __('site.privacy_content_09_p2_end') }}
                </p>
            </div>

            <div class="legal-section" id="children">
                <h2><span class="legal-num">10</span> {{ __('site.privacy_section_10') }}</h2>
                <p>
                    {{ __('site.privacy_content_10_p1_prefix') }} <strong>{{ __('site.privacy_content_10_p1_strong') }}</strong> {{ __('site.privacy_content_10_p1_suffix') }}
                </p>
            </div>

            <div class="legal-section" id="international">
                <h2><span class="legal-num">11</span> {{ __('site.privacy_section_11') }}</h2>
                <p>{{ __('site.privacy_content_11_p1') }}</p>
                <p>{{ __('site.privacy_content_11_p2') }}</p>
            </div>

            <div class="legal-section" id="changes">
                <h2><span class="legal-num">12</span> {{ __('site.privacy_section_12') }}</h2>
                <p>{{ __('site.privacy_content_12_p1') }}</p>
                <ul>
                    <li>{{ __('site.privacy_content_12_b1') }}</li>
                    <li>{{ __('site.privacy_content_12_b2_prefix') }} <strong>{{ __('site.privacy_content_12_b2_strong') }}</strong> {{ __('site.privacy_content_12_b2_suffix') }}</li>
                </ul>
                <p>{{ __('site.privacy_content_12_p2') }}</p>
            </div>

            <div class="legal-section" id="contact-dpo">
                <h2><span class="legal-num">13</span> {{ __('site.privacy_section_13') }}</h2>
                <p>{{ __('site.privacy_content_13_intro') }}</p>
                <div class="legal-contact-box">
                    <strong>{{ __('site.privacy_content_13_contact_title') }}</strong><br>
                    {{ config('regal.office_address') }}<br>
                    📞 <a href="tel:{{ config('regal.phone') }}">{{ config('regal.phone') }}</a><br>
                    ✉️ <a href="mailto:{{ config('regal.email') }}">{{ config('regal.email') }}</a><br>
                    💬 <a href="{{ config('regal.whatsapp_link') }}" target="_blank" rel="noopener">{{ __('site.privacy_content_13_whatsapp') }}</a>
                </div>
                <p style="margin-top:16px;">{{ __('site.privacy_content_13_p1') }}</p>
            </div>

        </article>
    </div>
</section>

@endsection
