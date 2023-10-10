<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(30),
            'short_description' => $this->faker->text(200),
            'long_description' => $this->faker->text(500),
            'category_id' => $this->faker->numberBetween(1, 10),
            'featured_image' => 'no image.jpg'
        ];
    }
}
