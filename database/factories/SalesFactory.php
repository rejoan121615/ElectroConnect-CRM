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
        $paymentMethod = fake()->numberBetween(1,2);

        return [
            'customer_id' => random_int(1,50),
            'paid_amount' => fake()->numberBetween(2000, 200000),
            'payment_method' => $paymentMethod,
            'trx_id' => $paymentMethod == 2 ? Str::random(35) : null,
            'discount' => fake()->numberBetween(10,100),
            'comment' => fake()->sentence(4)
        ];
    }
}
