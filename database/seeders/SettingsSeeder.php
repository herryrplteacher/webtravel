<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Site Info
            ['key_name' => 'site_name', 'value' => 'D3 Travel'],
            ['key_name' => 'site_tagline', 'value' => 'Modern booking • Fast confirmation'],
            ['key_name' => 'tagline', 'value' => 'Layanan 24 Jam • Door-to-door • Travel • Rental • Paket Kilat'],
            ['key_name' => 'footer_text', 'value' => 'All rights reserved'],

            // Contact Info
            ['key_name' => 'email', 'value' => 'info@d3travel.com'],
            ['key_name' => 'phone', 'value' => '082298900309'],
            ['key_name' => 'whatsapp_number', 'value' => '6282298900309'],
            ['key_name' => 'whatsapp_display', 'value' => '0822-9890-0309'],

            // Address
            ['key_name' => 'address', 'value' => 'Jl. Raya Travel No. 123, Jakarta Selatan'],

            // Social Media
            ['key_name' => 'facebook', 'value' => 'https://facebook.com/d3travel'],
            ['key_name' => 'instagram', 'value' => 'https://instagram.com/d3travel'],
            ['key_name' => 'twitter', 'value' => 'https://twitter.com/d3travel'],

            // Images
            ['key_name' => 'logo', 'value' => '/images/logo.png'],
            ['key_name' => 'hero_image', 'value' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80'],

            // SEO
            ['key_name' => 'meta_description', 'value' => 'Layanan travel door-to-door terpercaya dengan armada nyaman dan driver profesional'],
            ['key_name' => 'meta_keywords', 'value' => 'travel, rental mobil, door to door, shuttle, antar jemput'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key_name' => $setting['key_name']],
                ['value' => $setting['value']]
            );
        }

        $this->command->info('✅ Settings seeded successfully!');
    }
}
