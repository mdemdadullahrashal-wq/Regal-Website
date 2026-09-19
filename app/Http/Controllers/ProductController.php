<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('products.index', [
            'products' => $products,
            'metaTitle' => __('site.products_index_title').' | '.config('regal.brand_name'),
            'metaDescription' => __('site.products_index_lead'),
        ]);
    }

    public function show(string $locale, Product $product): View
    {
        abort_unless($product->is_active, 404);

        $related = Product::query()
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('products.show', [
            'product' => $product,
            'related' => $related,
            'metaTitle' => $product->localizedName().' | '.config('regal.brand_name'),
            'metaDescription' => $product->localizedTagline(),
        ]);
    }
}
