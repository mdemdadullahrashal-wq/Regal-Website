<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'bn'], true)) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('locale.switch');

Route::middleware('set.locale')->group(function (): void {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

    Route::get('/career', [PageController::class, 'career'])->name('career');
    Route::post('/career', [CareerController::class, 'store'])->name('career.submit');

    // Product pages
    Route::get('/pos-software', [PageController::class, 'pos'])->name('pos');
    Route::get('/erp-software', [PageController::class, 'erp'])->name('erp');
    Route::get('/bus-ticket', [PageController::class, 'busTicket'])->name('bus-ticket');

    Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
});
