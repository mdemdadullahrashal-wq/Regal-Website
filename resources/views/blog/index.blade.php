@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="section-head reveal">
            <span class="section-kicker">{{ __('site.blog_kicker') }}</span>
            <h1 class="section-title">{{ __('site.blog_title') }}</h1>
            <p class="section-lead">{{ __('site.blog_lead') }}</p>
        </div>

        <div class="blog-grid">
            @forelse ($posts as $post)
                <a class="blog-card reveal" href="{{ route('blog.show', $post->slug) }}">
                    <h3 class="blog-card__title">{{ $post->localizedTitle() }}</h3>
                    @if ($post->localizedExcerpt())
                        <p class="blog-card__excerpt">{{ $post->localizedExcerpt() }}</p>
                    @endif
                    <span class="blog-card__date">{{ $post->published_at?->format('d M Y') }}</span>
                </a>
            @empty
                <p>{{ __('site.blog_empty') }}</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
