<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

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
        $brands = Brand::pluck('id')->toArray();

        return [
            'name' => $this->faker->unique()->word, // Generate a unique word for each soda
            'carbonated' => $this->faker->boolean,
            'caffeinated' => $this->faker->boolean,
            'brand_id' => $this->faker->randomElement($brands), // Use Brand factory to generate brand_id
            'description' => $this->faker->text(50),
        ];
    }
}
