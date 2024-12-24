<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'expire_date' => fake()->date(),
            'price' => fake()->randomFloat(2),
            'prescription_requirment' => fake()->randomElement(['0', '1']),
            'on_stock_quantity' => fake()->randomNumber(2),
            'details' => fake()->text(50),
            'photo' => fake()->image(storage_path('app/public/images/items'), 640, 480, null, false), // Generates a fake image and returns the filename
            'user_id' => User::factory()
        ];
    }
}
