<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => UserFactory::new(),
            'name' => $this->faker->randomElement(['basic', 'pro', 'premium']),
            'stripe_id' => $this->faker->randomNumber(),
            'stripe_status' => $this->faker->randomElement(['active', 'trialing', 'past_due', 'unpaid', 'canceled', 'incomplete']),
            'stripe_price' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
            'trial_ends_at' => $this->faker->dateTime(),
            'ends_at' => $this->faker->dateTime(),
        ];
    }
}
