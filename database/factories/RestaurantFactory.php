<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'ville' => fake()->city(),
            'capacity' => fake()->numberBetween(10, 200),
            'cuisine' => fake()->randomElement(['Française', 'Italienne', 'Asiatique', 'Américaine', 'Méditerranéenne', 'Marocaine']),
            'user_id' => User::factory(),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
