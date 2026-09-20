{{--
    Reusable software carousel. Expects a pre-built `$slides` array of:
        accent, badge, title, desc, features[], tags[], cta_url, cta_label,
        icon (a Product model), visual_title, visual_kicker
--}}
@if (! empty($slides))
<div class="software-slider" data-software-slider>
    <div class="software-slider-toolbar">
        <div class="software-slider-progress">
            <span class="software-slider-label">{{ __('site.slide_label') }}</span>
            <div class="software-slider-dots" role="tablist">
                @foreach ($slides as $i => $s)
                    <button class="software-dot {{ $i === 0 ? 'is-active' : '' }}"
                            data-slide-to="{{ $i }}" role="tab"
                            aria-label="Slide {{ $i + 1 }}"
                            {{ $i === 0 ? 'aria-selected="true"' : 'aria-selected="false"' }}></button>
                @endforeach
            </div>
        </div>
        <div class="software-slider-nav">
            <button class="software-nav-btn" data-slide-prev aria-label="{{ __('site.slide_prev') }}">←</button>
            <button class="software-nav-btn" data-slide-next aria-label="{{ __('site.slide_next') }}">→</button>
        </div>
    </div>

    <div class="software-slider-stage">
        @foreach ($slides as $i => $s)
            <div class="software-slide {{ $i === 0 ? 'is-active' : '' }}" data-slide
                 style="--accent: {{ $s['accent'] ?? '#e02525' }}">
                <div class="software-slide-copy">
                    <span class="software-slide-badge"
                          style="background: color-mix(in srgb, var(--accent) 12%, #fff); color: var(--accent);">
                        {{ $s['badge'] ?? '' }}
                    </span>
                    <h3>{{ $s['title'] ?? '' }}</h3>
                    @if (! empty($s['desc']))
                        <p>{{ $s['desc'] }}</p>
                    @endif

                    @if (! empty($s['features']))
                        <ul class="software-feature-list">
                            @foreach ($s['features'] as $f)
                                <li>{{ $f }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="software-slide-meta">
                        @if (! empty($s['tags']))
                            @foreach ($s['tags'] as $tag)
                                <span>{{ $tag }}</span>
                            @endforeach
                        @endif
                        @if (! empty($s['cta_url']))
                            <a href="{{ $s['cta_url'] }}" class="software-slide-cta">{{ $s['cta_label'] ?? __('site.slide_view_details') }} →</a>
                        @endif
                    </div>
                </div>

                <div class="software-slide-visual">
                    <div class="software-visual-card"
                         style="background: color-mix(in srgb, var(--accent) 9%, #fff);">
                        <div class="software-visual-row">
                            <span class="software-visual-kpi">{{ $s['visual_kicker'] ?? '' }}</span>
                            @if (! empty($s['icon']))
                                <div class="software-visual-icon" style="color: var(--accent);">
                                    @include('partials.product-icon', ['product' => $s['icon']])
                                </div>
                            @endif
                        </div>
                        @if (! empty($s['visual_title']))
                            <strong class="software-visual-title">{{ $s['visual_title'] }}</strong>
                        @endif
                        <div class="software-visual-tags">
                            @if (! empty($s['cta_url']))
                                <a class="software-visual-cta" href="{{ $s['cta_url'] }}">{{ $s['cta_label'] ?? __('site.slide_view_details') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
