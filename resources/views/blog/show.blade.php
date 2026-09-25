@extends('layouts.app')

@push('jsonld')
@php
    $articleJson = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $post->localizedTitle(),
        'description' => $post->localizedExcerpt(),
        'datePublished' => $post->published_at?->toIso8601String(),
        'author' => ['@type' => 'Organization', 'name' => config('regal.brand_name')],
        'publisher' => ['@type' => 'Organization', 'name' => config('regal.brand_name')],
        'mainEntityOfPage' => url()->current(),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $breadcrumbJson = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => __('site.menu_home'), 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => __('site.blog_title'), 'item' => route('blog.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $post->localizedTitle(), 'item' => url()->current()],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
<script type="application/ld+json">{!! $articleJson !!}</script>
<script type="application/ld+json">{!! $breadcrumbJson !!}</script>
@endpush

@section('content')
<article class="page-section">
    <div class="container blog-article">
        <h1 class="blog-article__title reveal">{{ $post->localizedTitle() }}</h1>
        <p class="blog-article__meta reveal">{{ $post->published_at?->format('d M Y') }}</p>
        <div class="blog-article__body reveal">
            {!! \Illuminate\Support\Str::markdown($post->localizedBody()) !!}
        </div>
    </div>
</article>

@if ($recent->isNotEmpty())
<section class="page-section" style="background: var(--paper);">
    <div class="container">
        <h2 class="section-title reveal">{{ __('site.blog_recent_title') }}</h2>
        <div class="blog-grid blog-grid--recent">
            @foreach ($recent as $rp)
                <a class="blog-card reveal" href="{{ route('blog.show', $rp->slug) }}">
                    <h3 class="blog-card__title">{{ $rp->localizedTitle() }}</h3>
                    @if ($rp->localizedExcerpt())
                        <p class="blog-card__excerpt">{{ $rp->localizedExcerpt() }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
