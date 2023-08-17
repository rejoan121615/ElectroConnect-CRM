<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleDetails>
 */
class SaleDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "sales_id" => fake()->numberBetween(1,50),
            'product_id' => random_int(1,50),
            'quantity' => random_int(1,10),
            'price' => random_int(2000, 50000),
            'cost_price' => random_int(2000, 50000),
        ];
    }
}
