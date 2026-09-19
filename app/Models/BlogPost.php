<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'slug',
        'title_bn',
        'title_en',
        'excerpt_bn',
        'excerpt_en',
        'body_bn',
        'body_en',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function localizedTitle(): string
    {
        return app()->getLocale() === 'bn' ? $this->title_bn : $this->title_en;
    }

    public function localizedExcerpt(): string
    {
        $value = app()->getLocale() === 'bn' ? $this->excerpt_bn : $this->excerpt_en;

        return $value ?: '';
    }

    public function localizedBody(): string
    {
        return app()->getLocale() === 'bn' ? $this->body_bn : $this->body_en;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
