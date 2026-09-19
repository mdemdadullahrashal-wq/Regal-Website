<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'name_bn',
        'name_en',
        'tagline_bn',
        'tagline_en',
        'summary_bn',
        'summary_en',
        'features_bn',
        'features_en',
        'pricing_bn',
        'pricing_en',
        'faq_bn',
        'faq_en',
        'demo_url',
        'register_url',
        'login_url',
        'is_saas',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'features_bn' => 'array',
        'features_en' => 'array',
        'pricing_bn' => 'array',
        'pricing_en' => 'array',
        'faq_bn' => 'array',
        'faq_en' => 'array',
        'is_saas' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function localizedName(): string
    {
        return app()->getLocale() === 'bn' ? $this->name_bn : $this->name_en;
    }

    public function localizedTagline(): string
    {
        $value = app()->getLocale() === 'bn' ? $this->tagline_bn : $this->tagline_en;

        return $value ?: $this->localizedName();
    }

    public function localizedSummary(): string
    {
        return app()->getLocale() === 'bn' ? ($this->summary_bn ?? '') : ($this->summary_en ?? '');
    }

    public function localizedFeatures(): array
    {
        return app()->getLocale() === 'bn'
            ? ($this->features_bn ?? [])
            : ($this->features_en ?? []);
    }

    public function localizedPricing(): ?array
    {
        return app()->getLocale() === 'bn'
            ? ($this->pricing_bn ?? null)
            : ($this->pricing_en ?? null);
    }

    public function localizedFaq(): array
    {
        return app()->getLocale() === 'bn'
            ? ($this->faq_bn ?? [])
            : ($this->faq_en ?? []);
    }
}
