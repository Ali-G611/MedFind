<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'location' => fake()->address(),
        'phone' => fake()->phoneNumber(),
        'birth' => fake()->date(),
        'user_id' => 1
        ];
    }
}
