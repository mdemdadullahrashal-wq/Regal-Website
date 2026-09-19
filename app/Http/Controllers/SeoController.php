<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $base = rtrim((string) config('app.url'), '/');

        $products = Schema::hasTable('products')
            ? Product::query()->where('is_active', true)->orderBy('sort_order')->get()
            : collect();

        $posts = Schema::hasTable('blog_posts')
            ? BlogPost::query()->where('is_active', true)->orderByDesc('published_at')->get()
            : collect();

        $urls = [];

        foreach (['bn', 'en'] as $locale) {
            $urls[] = [
                'loc' => "{$base}/{$locale}",
                'alternates' => $this->alternates($base, '', $locale),
            ];
            $urls[] = ['loc' => "{$base}/{$locale}/products"];
            $urls[] = ['loc' => "{$base}/{$locale}/blog"];
            $urls[] = ['loc' => "{$base}/{$locale}/about"];
            $urls[] = ['loc' => "{$base}/{$locale}/contact"];
        }

        foreach ($products as $product) {
            foreach (['bn', 'en'] as $locale) {
                $path = "/products/{$product->slug}";
                $urls[] = [
                    'loc' => "{$base}/{$locale}{$path}",
                    'alternates' => $this->alternates($base, $path, $locale),
                ];
            }
        }

        foreach ($posts as $post) {
            foreach (['bn', 'en'] as $locale) {
                $path = "/blog/{$post->slug}";
                $urls[] = [
                    'loc' => "{$base}/{$locale}{$path}",
                    'alternates' => $this->alternates($base, $path, $locale),
                ];
            }
        }

        $xml = view('seo.sitemap', ['urls' => $urls])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function llms(): Response
    {
        $base = rtrim((string) config('app.url'), '/');

        $products = Schema::hasTable('products')
            ? Product::query()->where('is_active', true)->orderBy('sort_order')->get()
            : collect();

        $lines = [
            '# '.config('regal.brand_name'),
            '> '.config('regal.tagline'),
            '',
            'A SaaS software company based in Dhaka, Bangladesh. We build subscription software for schools, apartments, sales teams, mosques, retail, and transport.',
            '',
        ];

        foreach ($products as $product) {
            $name = $product->name_en;
            $summary = $product->summary_en ?: $product->tagline_en;
            $lines[] = "- [{$name}]({$base}/en/products/{$product->slug}): {$summary}";
        }

        $lines[] = '';
        $lines[] = '- [About]('.$base.'/en/about): Company background and mission';
        $lines[] = '- [Contact]('.$base.'/en/contact): Get in touch for a demo or quote';
        $lines[] = '- [Blog]('.$base.'/en/blog): Articles on automation and digitization';

        return response(implode("\n", $lines)."\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    private function alternates(string $base, string $path, string $currentLocale): array
    {
        $other = $currentLocale === 'bn' ? 'en' : 'bn';

        return [
            'bn' => "{$base}/bn{$path}",
            'en' => "{$base}/en{$path}",
        ];
    }
}
