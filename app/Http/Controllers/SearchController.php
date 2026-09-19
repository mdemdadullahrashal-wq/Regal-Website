<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = trim((string) $request->input('q', ''));
        $locale = app()->getLocale();

        $products = collect();
        $posts = collect();

        if ($query !== '') {
            $products = Schema::hasTable('products')
                ? Product::query()
                    ->where('is_active', true)
                    ->where(function ($q) use ($query, $locale) {
                        $q->where('name_bn', 'like', "%{$query}%")
                            ->orWhere('name_en', 'like', "%{$query}%")
                            ->orWhere('tagline_bn', 'like', "%{$query}%")
                            ->orWhere('tagline_en', 'like', "%{$query}%")
                            ->orWhere('summary_bn', 'like', "%{$query}%")
                            ->orWhere('summary_en', 'like', "%{$query}%");
                    })
                    ->orderBy('sort_order')
                    ->get()
                : collect();

            $posts = Schema::hasTable('blog_posts')
                ? BlogPost::query()
                    ->where('is_active', true)
                    ->where(function ($q) use ($query, $locale) {
                        $q->where('title_bn', 'like', "%{$query}%")
                            ->orWhere('title_en', 'like', "%{$query}%")
                            ->orWhere('body_bn', 'like', "%{$query}%")
                            ->orWhere('body_en', 'like', "%{$query}%");
                    })
                    ->orderByDesc('published_at')
                    ->get()
                : collect();
        }

        return view('search.index', [
            'query' => $query,
            'products' => $products,
            'posts' => $posts,
            'metaTitle' => __('site.search_title').' | '.config('regal.brand_name'),
            'metaDescription' => __('site.search_lead'),
        ]);
    }
}
