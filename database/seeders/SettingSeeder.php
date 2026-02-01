<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key_name' => 'site_name', 'value' => 'Web Travel'],
            ['key_name' => 'site_email', 'value' => 'info@webtravel.com'],
            ['key_name' => 'site_phone', 'value' => '+62 812-3456-7890'],
            ['key_name' => 'site_address', 'value' => 'Jl. Contoh No. 123, Jakarta, Indonesia'],
            ['key_name' => 'site_description', 'value' => 'Layanan travel terpercaya untuk perjalanan Anda'],
            ['key_name' => 'wa_number', 'value' => '6281234567890'],
            ['key_name' => 'facebook_url', 'value' => 'https://facebook.com/webtravel'],
            ['key_name' => 'instagram_url', 'value' => 'https://instagram.com/webtravel'],
            ['key_name' => 'twitter_url', 'value' => 'https://twitter.com/webtravel'],
            ['key_name' => 'footer_copyright', 'value' => '© 2026 Web Travel. All rights reserved.'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
