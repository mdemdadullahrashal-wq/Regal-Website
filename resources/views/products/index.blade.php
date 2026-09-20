@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.products_section_kicker') }}</span>
            <h1 class="section-title">{{ __('site.products_index_title') }}</h1>
            <p class="section-lead">{{ __('site.products_index_lead') }}</p>
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

{{-- CTA --}}
<section class="cta-band">
    <div class="container cta-band-inner">
        <div>
            <h2>{{ __('site.products_cta_title') }}</h2>
            <p>{{ __('site.products_cta_body') }}</p>
        </div>
        <div class="cta-band-actions">
            <a href="{{ route('contact') }}" class="btn-primary">{{ __('site.products_cta_contact') }}</a>
        </div>
    </div>
</section>
@endsection
