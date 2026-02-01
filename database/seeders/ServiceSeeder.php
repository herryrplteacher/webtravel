<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Travel Antar Kota', 'slug' => 'travel-antar-kota', 'is_active' => true],
            ['name' => 'Shuttle Bandara', 'slug' => 'shuttle-bandara', 'is_active' => true],
            ['name' => 'City Tour', 'slug' => 'city-tour', 'is_active' => true],
            ['name' => 'Carter Mobil', 'slug' => 'carter-mobil', 'is_active' => true],
            ['name' => 'Drop Off', 'slug' => 'drop-off', 'is_active' => true],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
