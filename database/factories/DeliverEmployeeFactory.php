<?php

namespace Database\Factories;

use App\Models\ShippingDep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliverEmployee>
 */
class DeliverEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ensure the ShippingDep model exists and get a random dep_id
        $depIds = ShippingDep::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'wage' => $this->faker->numberBetween(10, 1000),
            'address' => $this->faker->address(),
            'dep_id' => $this->faker->randomElement($depIds), // Randomly assign an existing dep_id
        ];
    }
}