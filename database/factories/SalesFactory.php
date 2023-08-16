<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => random_int(1,50),
            'paid_amount' => fake()->numberBetween(2000, 200000),
            'payment_method' => array_rand(['bkash', 'cash']),
            'trx_id' => Str::random(35),
            'discount' => fake()->numberBetween(10,100),
            'comment' => fake()->sentence(4)
        ];
    }
}
