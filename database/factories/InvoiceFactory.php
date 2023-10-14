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
        $paymentStatus = array(
            'paid',
            'unpaid',
        );
        $statusKey = array_rand($paymentStatus);
        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'order_id' => $this->faker->numberBetween(1, 10),
            'total_amount' => $this->faker->numberBetween(10, 500),
            'invoice_date' => $this->faker->dateTime->format('Y-m-d H:i:s'),
            'payment_status' => $paymentStatus[$statusKey],
        ];
    }
}
