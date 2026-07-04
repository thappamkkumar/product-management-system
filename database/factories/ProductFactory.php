<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(rand(2, 4), true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 100, 100000),
            'date_available' => fake()->dateTimeBetween('-1 month', '+3 months'),
        ];
    }
}