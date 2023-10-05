<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 50),
            'order_date' => $this->faker->dateTime(),
            'total_amount' => $this->faker->numberBetween(500, 50000),
            'payment_status' => $this->faker->numberBetween(1, 2),
            'shipping_status' => $this->faker->numberBetween(1, 2),
        ];
    }
}
