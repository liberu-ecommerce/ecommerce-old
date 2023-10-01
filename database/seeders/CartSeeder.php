<?php

namespace Database\Seeders;


use App\Models\CartItem;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CartItem::factory()->count(1000)->create();
    }
}
