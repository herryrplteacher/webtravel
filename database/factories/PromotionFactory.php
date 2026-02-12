<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(2),
            'image' => 'promotions/placeholder.jpg',
            'button_text' => fake()->randomElement(['Pesan Sekarang', 'Hubungi Kami', 'Lihat Detail']),
            'button_url' => null,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'sort_order' => fake()->numberBetween(0, 10),
            'is_active' => true,
            'created_by' => User::factory(),
        ];
    }
}
