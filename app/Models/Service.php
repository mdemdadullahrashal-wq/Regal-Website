<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'title_en',
        'title_bn',
        'summary_en',
        'summary_bn',
        'features_en',
        'features_bn',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features_en' => 'array',
        'features_bn' => 'array',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'localized_title',
        'localized_summary',
        'localized_features',
    ];

    public function getLocalizedTitleAttribute(): string
    {
        return app()->getLocale() === 'bn' ? $this->title_bn : $this->title_en;
    }

    public function getLocalizedSummaryAttribute(): string
    {
        return app()->getLocale() === 'bn' ? $this->summary_bn : $this->summary_en;
    }

    public function getLocalizedFeaturesAttribute(): array
    {
        return app()->getLocale() === 'bn'
            ? ($this->features_bn ?? [])
            : ($this->features_en ?? []);
    }
}
