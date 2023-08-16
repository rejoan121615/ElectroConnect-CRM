<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchasedProduct>
 */
class PurchasedProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transection_id' => random_int(1,50),
            'product_id' => random_int(1, 50),
            'quantity' => random_int(1, 35)
        ];
    }
}
