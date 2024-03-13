<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soda>
 */
class SodaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word, // Generate a unique word for each soda
            'carbonated' => fake()->boolean,
            'caffeinated' => fake()->boolean,
        ];
    }
}
