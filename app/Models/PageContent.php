<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'key',
        'title_en',
        'title_bn',
        'body_en',
        'body_bn',
        'meta_title_en',
        'meta_title_bn',
        'meta_description_en',
        'meta_description_bn',
    ];

    public function localizedTitle(?string $fallback = null): ?string
    {
        $locale = app()->getLocale();
        $value = $locale === 'bn' ? $this->title_bn : $this->title_en;

        return $value ?: $fallback;
    }

    public function localizedBody(?string $fallback = null): ?string
    {
        $locale = app()->getLocale();
        $value = $locale === 'bn' ? $this->body_bn : $this->body_en;

        return $value ?: $fallback;
    }
}
