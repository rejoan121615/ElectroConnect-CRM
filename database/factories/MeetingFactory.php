<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "title" => fake()->sentence(5),
            "description" => fake()->paragraph(3),
            "supplier_id" => fake()->numberBetween(1, 49),
            "date" => fake()->date('Y-m-d'),
            "time" => fake()->time('H:i')
        ];
    }
}
