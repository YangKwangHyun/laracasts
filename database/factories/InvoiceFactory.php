<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subscription_id' => SubscriptionFactory::new(),
            'number' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(['paid', 'unpaid']),
            'currency' => $this->faker->currencyCode(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'subtotal' => $this->faker->randomFloat(2, 0, 1000),
            'tax' => $this->faker->randomFloat(2, 0, 1000),
            'tax_percent' => $this->faker->randomFloat(2, 0, 1000),
            'starting_balance' => $this->faker->randomFloat(2, 0, 1000),
            'ending_balance' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
