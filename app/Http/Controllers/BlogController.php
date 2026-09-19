<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::query()
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->get();

        return view('blog.index', [
            'posts' => $posts,
            'metaTitle' => __('site.blog_title').' | '.config('regal.brand_name'),
            'metaDescription' => __('site.blog_lead'),
        ]);
    }

    public function show(string $locale, BlogPost $post): View
    {
        abort_unless($post->is_active, 404);

        $recent = BlogPost::query()
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('blog.show', [
            'post' => $post,
            'recent' => $recent,
            'metaTitle' => $post->localizedTitle().' | '.config('regal.brand_name'),
            'metaDescription' => $post->localizedExcerpt(),
        ]);
    }
}
