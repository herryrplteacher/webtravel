<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => Service::inRandomOrder()->first()?->id ?? Service::factory(),
            'title' => fake()->sentence(4),
            'from_location_id' => Location::inRandomOrder()->first()?->id ?? Location::factory(),
            'to_location_id' => Location::inRandomOrder()->first()?->id ?? Location::factory(),
            'price_from' => fake()->numberBetween(50000, 500000),
            'duration' => fake()->randomElement(['30 menit', '1 jam', '1.5 jam', '2 jam', '3 jam']),
            'short_desc' => fake()->sentence(10),
            'cover_image' => null,
            'is_active' => fake()->boolean(80),
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
