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
        return [
            'name' => fake()->unique()->sentence(6),
            'description' => fake()->paragraph,
            'category_id' => fake()->numberBetween(1,25),
            'brand_id' => fake()->numberBetween(1,25),
            'supplier_id' => fake()->numberBetween(1,20),
            'stock' => fake()->numberBetween(0,1000),
            'price' => fake()->numberBetween(2000, 200000),
            'cost_price' => fake()->numberBetween(2000, 200000),
            'weight' => fake()->randomFloat(2,0.1,100),
            'dimension' => fake()->numberBetween(2,5),
            'tags' => null,
            'image' => 'products/Obuq0yQ2FsJNDU8KPcyrKsImViaHD92mEmqArc0d.jpg',
        ];
}}
