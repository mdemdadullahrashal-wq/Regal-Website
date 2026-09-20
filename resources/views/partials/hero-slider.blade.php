{{--
    Full-width hero carousel. Expects `$slides` array:
        accent, badge, title, desc, cta_url, cta_label, icon (Product), visual_kicker
--}}
@if (! empty($slides))
<section class="hero-slider" data-software-slider aria-label="{{ __('site.slide_section_title') }}">
    <div class="hero-slider__stage">
        @foreach ($slides as $i => $s)
            <div class="hero-slide {{ $i === 0 ? 'is-active' : '' }}" data-slide
                 style="--accent: {{ $s['accent'] ?? '#e02525' }}">
                <div class="container hero-slide__inner">
                    <div class="hero-slide__copy">
                        <span class="hero-slide__badge">{{ $s['badge'] ?? '' }}</span>
                        <h2>{{ $s['title'] ?? '' }}</h2>
                        <p>{{ $s['desc'] ?? '' }}</p>
                        <div class="hero-slide__cta">
                            @if (! empty($s['cta_url']))
                                <a class="btn btn-primary" href="{{ $s['cta_url'] }}">{{ $s['cta_label'] ?? __('site.slide_view_details') }}</a>
                            @endif
                            <a class="btn btn-outline" href="{{ route('contact') }}">{{ __('site.cta_contact') }}</a>
                        </div>
                    </div>

                    <div class="hero-slide__visual">
                        <div class="app-mockup">
                            <div class="app-mockup__bar"><span></span><span></span><span></span></div>
                            <div class="app-mockup__body">
                                <div class="app-mockup__head">
                                    <div class="app-mockup__icon">@include('partials.product-icon', ['product' => $s['icon']])</div>
                                    <div class="app-mockup__name">
                                        <strong>{{ $s['title'] ?? '' }}</strong>
                                        <small>{{ $s['visual_kicker'] ?? '' }}</small>
                                    </div>
                                </div>
                                <div class="app-mockup__lines"><i></i><i></i><i></i><i></i></div>
                                <div class="app-mockup__cards"><div></div><div></div><div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container hero-slider__controls">
        <div class="hero-slider__dots" role="tablist">
            @foreach ($slides as $i => $s)
                <button class="hero-dot {{ $i === 0 ? 'is-active' : '' }}"
                        data-slide-to="{{ $i }}" role="tab" aria-label="Slide {{ $i + 1 }}"
                        {{ $i === 0 ? 'aria-selected="true"' : 'aria-selected="false"' }}></button>
            @endforeach
        </div>
        <div class="hero-slider__nav">
            <button class="hero-nav-btn" data-slide-prev aria-label="{{ __('site.slide_prev') }}">←</button>
            <button class="hero-nav-btn" data-slide-next aria-label="{{ __('site.slide_next') }}">→</button>
        </div>
    </div>
</section>
@endif
