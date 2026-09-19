<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $home = $this->pageByKey('home');

        return view('pages.home', [
            'homeTitle' => $home?->localizedTitle(__('site.hero_title')),
            'homeBody' => $home?->localizedBody(__('site.hero_subtitle')),
            'metaTitle' => $home?->localizedTitle(config('regal.brand_name')),
            'metaDescription' => $home?->localizedBody(config('regal.tagline')),
        ]);
    }

    public function about(): View
    {
        $page = $this->pageByKey('about');

        return view('pages.about', [
            'title' => $page?->localizedTitle('About Regal Solution'),
            'body' => $page?->localizedBody(config('regal.tagline')),
            'metaTitle' => $page?->localizedTitle('About | '.config('regal.brand_name')),
            'metaDescription' => $page?->localizedBody(config('regal.tagline')),
        ]);
    }

    public function contact(): View
    {
        $page = $this->pageByKey('contact');

        return view('pages.contact', [
            'title' => $page?->localizedTitle(__('site.contact_heading')),
            'body' => $page?->localizedBody(config('regal.tagline')),
            'metaTitle' => $page?->localizedTitle('Contact | '.config('regal.brand_name')),
            'metaDescription' => $page?->localizedBody(config('regal.tagline')),
        ]);
    }

    public function career(): View
    {
        $page = $this->pageByKey('career');

        return view('pages.career', [
            'title' => $page?->localizedTitle(__('site.career_heading')),
            'body' => $page?->localizedBody(config('regal.tagline')),
            'metaTitle' => $page?->localizedTitle('Career | '.config('regal.brand_name')),
            'metaDescription' => $page?->localizedBody(config('regal.tagline')),
        ]);
    }

    public function pos(): View
    {
        return view('pages.pos', [
            'metaTitle' => 'POS Software | '.config('regal.brand_name'),
            'metaDescription' => 'Fast, reliable point-of-sale software for retail and restaurants in Bangladesh.',
        ]);
    }

    public function erp(): View
    {
        return view('pages.erp', [
            'metaTitle' => 'ERP Software | '.config('regal.brand_name'),
            'metaDescription' => 'Enterprise resource planning software connecting finance, HR, inventory, and more.',
        ]);
    }

    public function busTicket(): View
    {
        return view('pages.bus-ticket', [
            'metaTitle' => 'Bus Ticket Booking & Management | '.config('regal.brand_name'),
            'metaDescription' => 'Complete bus ticket booking and fleet management system for transport companies.',
        ]);
    }

    public function privacy(): View
    {
        $page = $this->pageByKey('privacy');

        return view('pages.privacy', [
            'title' => $page?->localizedTitle(__('site.privacy_title')),
            'body' => $page?->localizedBody('We protect user data and process information for business communication only.'),
            'metaTitle' => $page?->localizedTitle(__('site.privacy_title').' | '.config('regal.brand_name')),
            'metaDescription' => $page?->localizedBody(config('regal.tagline')),
        ]);
    }

    public function terms(): View
    {
        $page = $this->pageByKey('terms');

        return view('pages.terms', [
            'title' => $page?->localizedTitle(__('site.terms_title')),
            'body' => $page?->localizedBody('Use of our software products and service agreements are subject to written terms.'),
            'metaTitle' => $page?->localizedTitle(__('site.terms_title').' | '.config('regal.brand_name')),
            'metaDescription' => $page?->localizedBody(config('regal.tagline')),
        ]);
    }

    private function pageByKey(string $key): ?PageContent
    {
        if (! Schema::hasTable('page_contents')) {
            return null;
        }

        return PageContent::query()->where('key', $key)->first();
    }
}
