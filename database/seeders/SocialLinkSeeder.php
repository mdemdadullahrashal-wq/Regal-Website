<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['name' => 'Facebook', 'icon' => 'facebook', 'url' => '', 'sort_order' => 1],
            ['name' => 'YouTube', 'icon' => 'youtube', 'url' => '', 'sort_order' => 2],
            ['name' => 'LinkedIn', 'icon' => 'linkedin', 'url' => '', 'sort_order' => 3],
            ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '', 'sort_order' => 4],
            ['name' => 'X (Twitter)', 'icon' => 'x', 'url' => '', 'sort_order' => 5],
            ['name' => 'TikTok', 'icon' => 'tiktok', 'url' => '', 'sort_order' => 6],
            ['name' => 'WhatsApp', 'icon' => 'whatsapp', 'url' => config('regal.whatsapp_link'), 'sort_order' => 7],
            ['name' => 'Telegram', 'icon' => 'telegram', 'url' => '', 'sort_order' => 8],
        ];

        foreach ($links as $data) {
            SocialLink::query()->updateOrCreate(
                ['icon' => $data['icon']],
                $data + ['is_active' => true],
            );
        }
    }
}
