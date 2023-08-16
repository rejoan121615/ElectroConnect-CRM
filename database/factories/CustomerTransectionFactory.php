<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerTransection>
 */
class CustomerTransectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "customer_id" => random_int(1, 50),
            "payment_method" => 'cash',
            "paid_amount" => random_int(2000, 50000)
        ];
    }
}
