<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Root redirect — Bangla is the default locale.
|--------------------------------------------------------------------------
*/
Route::redirect('/', '/bn', 301);

/*
|--------------------------------------------------------------------------
| Locale-prefixed public routes: /{locale}/...
|--------------------------------------------------------------------------
*/
Route::prefix('{locale}')
    ->whereIn('locale', ['bn', 'en'])
    ->middleware('set.locale')
    ->group(function (): void {
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/about', [PageController::class, 'about'])->name('about');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

        Route::get('/career', [PageController::class, 'career'])->name('career');
        Route::post('/career', [CareerController::class, 'store'])->name('career.submit');

        // Products
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

        // Blog
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

        // Search
        Route::get('/search', [SearchController::class, 'index'])->name('search');

        // Lead capture
        Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

        // Legal
        Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
        Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
    });

/*
|--------------------------------------------------------------------------
| SEO / AI endpoints (locale-independent).
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/llms.txt', [SeoController::class, 'llms'])->name('llms');
