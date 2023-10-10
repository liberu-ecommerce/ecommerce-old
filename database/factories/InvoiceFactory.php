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
            'customer_id' => $this->faker->numberBetween(1, 50),
            'order_id' => $this->faker->numberBetween(1, 50),
            'invoice_date' => $this->faker->dateTime(),
            'total_amount' => $this->faker->numberBetween(10, 500),
            'payment_status' => $this->faker->numberBetween(1, 2),
        ];
    }
}
