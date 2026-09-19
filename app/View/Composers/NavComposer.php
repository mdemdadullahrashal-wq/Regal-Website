<?php

namespace App\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class NavComposer
{
    public function compose(View $view): void
    {
        $view->with('navProducts', Schema::hasTable('products')
            ? Product::query()->where('is_active', true)->orderBy('sort_order')->orderBy('id')->get()
            : collect());
    }
}
