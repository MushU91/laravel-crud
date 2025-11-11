<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            // Example product categories
            $categories = ['Laptop', 'Smartphone', 'Headphones', 'Keyboard', 'Mouse', 'Monitor', 'Camera', 'Speaker'];

            return [
                'name' => fake()->randomElement($categories) . ' ' . fake()->unique()->numerify('Model ###'),
                'description' => fake()->sentence(10),
                'price' => fake()->randomFloat(2, 20, 1000),
                'stock' => fake()->numberBetween(0, 200),
                'sku' => strtoupper(fake()->bothify('SKU-??-#####')),
            ];
    }

}
