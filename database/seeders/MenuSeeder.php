<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main menu items
        $home = Menu::create([
            'title' => 'Beranda',
            'url' => '/',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $services = Menu::create([
            'title' => 'Layanan',
            'url' => '/services',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $routes = Menu::create([
            'title' => 'Rute Perjalanan',
            'url' => '/routes',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        $locations = Menu::create([
            'title' => 'Lokasi',
            'url' => '/locations',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        $about = Menu::create([
            'title' => 'Tentang',
            'url' => '/about',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        $contact = Menu::create([
            'title' => 'Kontak',
            'url' => '/contact',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // Submenu for Services
        Menu::create([
            'parent_id' => $services->id,
            'title' => 'Travel',
            'url' => '/services/travel',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'parent_id' => $services->id,
            'title' => 'Rental Mobil',
            'url' => '/services/car-rental',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Menu::create([
            'parent_id' => $services->id,
            'title' => 'Paket Wisata',
            'url' => '/services/tour-packages',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Submenu for About
        Menu::create([
            'parent_id' => $about->id,
            'title' => 'Profil Perusahaan',
            'url' => '/about/company',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'parent_id' => $about->id,
            'title' => 'Tim Kami',
            'url' => '/about/team',
            'sort_order' => 2,
            'is_active' => true,
        ]);
    }
}
