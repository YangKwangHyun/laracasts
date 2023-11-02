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
            'total' => $this->faker->randomNumber(4),
            'charge_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'paid' => $this->faker->boolean(),
        ];
    }
}
