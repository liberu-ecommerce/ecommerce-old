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
        $paymentStatus = array(
            'paid',
            'unpaid',
        );
        $statusKey = array_rand($paymentStatus);

        $shippingStatus = array(
            'pending',
            'shipped',
            'delivered',
        );
        $shippingStatusKey = array_rand($shippingStatus);
        return [
            'customer_id' => $this->faker->numberBetween(1, 50),
            'order_date' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'total_amount' => $this->faker->numberBetween(500, 50000),
            'payment_status' => $paymentStatus[$statusKey],
            'shipping_status' => $shippingStatus[$shippingStatusKey],
        ];
    }
}
