@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.search_kicker') }}</span>
            <h1 class="section-title">{{ __('site.search_title') }}</h1>
        </div>

        <form class="search-form reveal" method="get" action="{{ route('search') }}" role="search">
            <input type="search" name="q" value="{{ $query }}" placeholder="{{ __('site.search_placeholder') }}" aria-label="{{ __('site.search_placeholder') }}">
            <button type="submit" class="btn btn-primary">{{ __('site.search_submit') }}</button>
        </form>

        @if ($query !== '')
            <p class="search-count reveal">{{ __('site.search_count', ['count' => $products->count() + $posts->count(), 'query' => $query]) }}</p>
        @endif

        @if ($query !== '')
            @if ($products->isNotEmpty())
                <h2 class="search-group reveal">{{ __('site.menu_products') }}</h2>
                <div class="products-grid">
                    @foreach ($products as $product)
                        <a class="product-card reveal" href="{{ route('products.show', $product->slug) }}">
                            <div class="product-card__top">
                                <span class="product-card__badge {{ $product->is_saas ? 'product-card__badge--saas' : 'product-card__badge--service' }}">
                                    {{ $product->is_saas ? __('site.product_type_saas') : __('site.product_type_service') }}
                                </span>
                            </div>
                            <div class="product-card__icon">{{ strtoupper(mb_substr($product->name_en, 0, 2)) }}</div>
                            <h3 class="product-card__name">{{ $product->localizedName() }}</h3>
                            <p class="product-card__tagline">{{ $product->localizedTagline() }}</p>
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($posts->isNotEmpty())
                <h2 class="search-group reveal">{{ __('site.menu_blog') }}</h2>
                <div class="blog-grid">
                    @foreach ($posts as $post)
                        <a class="blog-card reveal" href="{{ route('blog.show', $post->slug) }}">
                            <h3 class="blog-card__title">{{ $post->localizedTitle() }}</h3>
                            @if ($post->localizedExcerpt())
                                <p class="blog-card__excerpt">{{ $post->localizedExcerpt() }}</p>
                            @endif
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($products->isEmpty() && $posts->isEmpty())
                <p class="search-empty reveal">{{ __('site.search_empty') }}</p>
            @endif
        @endif
    </div>
</section>
@endsection
