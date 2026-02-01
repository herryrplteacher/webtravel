<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Route;
use App\Models\Service;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $travelService = Service::where('slug', 'travel-antar-kota')->first();
        $shuttleService = Service::where('slug', 'shuttle-bandara')->first();

        $jakarta = Location::where('name', 'Jakarta')->first();
        $bandung = Location::where('name', 'Bandung')->first();
        $surabaya = Location::where('name', 'Surabaya')->first();
        $yogyakarta = Location::where('name', 'Yogyakarta')->first();
        $soekarnohatta = Location::where('name', 'Bandara Soekarno-Hatta')->first();
        $husein = Location::where('name', 'Bandara Husein Sastranegara')->first();

        $routes = [
            [
                'service_id' => $travelService->id,
                'title' => 'Jakarta - Bandung',
                'slug' => 'jakarta-bandung',
                'from_location_id' => $jakarta->id,
                'to_location_id' => $bandung->id,
                'price_from' => 150000,
                'duration' => '3 jam',
                'short_desc' => 'Perjalanan nyaman dari Jakarta ke Bandung dengan fasilitas lengkap dan driver berpengalaman.',
                'is_active' => true,
            ],
            [
                'service_id' => $travelService->id,
                'title' => 'Bandung - Jakarta',
                'slug' => 'bandung-jakarta',
                'from_location_id' => $bandung->id,
                'to_location_id' => $jakarta->id,
                'price_from' => 150000,
                'duration' => '3 jam',
                'short_desc' => 'Travel dari Bandung ke Jakarta dengan keberangkatan setiap hari dan harga terjangkau.',
                'is_active' => true,
            ],
            [
                'service_id' => $travelService->id,
                'title' => 'Jakarta - Yogyakarta',
                'slug' => 'jakarta-yogyakarta',
                'from_location_id' => $jakarta->id,
                'to_location_id' => $yogyakarta->id,
                'price_from' => 350000,
                'duration' => '8 jam',
                'short_desc' => 'Travel Jakarta ke Yogyakarta dengan bus executive dan rest area nyaman.',
                'is_active' => true,
            ],
            [
                'service_id' => $travelService->id,
                'title' => 'Bandung - Yogyakarta',
                'slug' => 'bandung-yogyakarta',
                'from_location_id' => $bandung->id,
                'to_location_id' => $yogyakarta->id,
                'price_from' => 300000,
                'duration' => '7 jam',
                'short_desc' => 'Perjalanan Bandung ke Yogyakarta dengan armada baru dan pelayanan prima.',
                'is_active' => true,
            ],
            [
                'service_id' => $shuttleService->id,
                'title' => 'Jakarta - Bandara Soekarno-Hatta',
                'slug' => 'jakarta-bandara-soekarno-hatta',
                'from_location_id' => $jakarta->id,
                'to_location_id' => $soekarnohatta->id,
                'price_from' => 100000,
                'duration' => '1.5 jam',
                'short_desc' => 'Shuttle bandara Jakarta ke Soekarno-Hatta dengan jadwal fleksibel.',
                'is_active' => true,
            ],
            [
                'service_id' => $shuttleService->id,
                'title' => 'Bandung - Bandara Husein Sastranegara',
                'slug' => 'bandung-bandara-husein-sastranegara',
                'from_location_id' => $bandung->id,
                'to_location_id' => $husein->id,
                'price_from' => 50000,
                'duration' => '45 menit',
                'short_desc' => 'Layanan antar jemput bandara Husein Sastranegara yang cepat dan aman.',
                'is_active' => true,
            ],
            [
                'service_id' => $travelService->id,
                'title' => 'Surabaya - Jakarta',
                'slug' => 'surabaya-jakarta',
                'from_location_id' => $surabaya->id,
                'to_location_id' => $jakarta->id,
                'price_from' => 400000,
                'duration' => '12 jam',
                'short_desc' => 'Travel malam Surabaya ke Jakarta dengan seat reclining.',
                'is_active' => true,
            ],
        ];

        foreach ($routes as $route) {
            Route::create($route);
        }
    }
}
