<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            // Cities
            ['name' => 'Jakarta', 'type' => 'city', 'is_active' => true],
            ['name' => 'Bandung', 'type' => 'city', 'is_active' => true],
            ['name' => 'Surabaya', 'type' => 'city', 'is_active' => true],
            ['name' => 'Yogyakarta', 'type' => 'city', 'is_active' => true],
            ['name' => 'Semarang', 'type' => 'city', 'is_active' => true],
            ['name' => 'Malang', 'type' => 'city', 'is_active' => true],
            ['name' => 'Solo', 'type' => 'city', 'is_active' => true],
            ['name' => 'Bali', 'type' => 'city', 'is_active' => true],

            // Airports
            ['name' => 'Bandara Soekarno-Hatta', 'type' => 'airport', 'is_active' => true],
            ['name' => 'Bandara Husein Sastranegara', 'type' => 'airport', 'is_active' => true],
            ['name' => 'Bandara Juanda', 'type' => 'airport', 'is_active' => true],
            ['name' => 'Bandara Adi Sucipto', 'type' => 'airport', 'is_active' => true],
            ['name' => 'Bandara Ngurah Rai', 'type' => 'airport', 'is_active' => true],

            // Areas
            ['name' => 'Puncak', 'type' => 'area', 'is_active' => true],
            ['name' => 'Lembang', 'type' => 'area', 'is_active' => true],
            ['name' => 'Ciwidey', 'type' => 'area', 'is_active' => true],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
