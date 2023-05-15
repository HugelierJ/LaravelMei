<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $carts = Cart::take(Cart::all()->count())->get();
        $productIds = Product::pluck("id")->toArray();
        foreach ($carts as $cart) {
            for ($i = 0; $i <= 5; $i++) {
                $productId = fake()->randomElement($productIds);

                CartItem::create([
                    "cart_id" => $cart->id,
                    "product_id" => $productId,
                    "quantity" => rand(1, 5),
                    "price" => fake()->randomFloat(2, 1, 800),
                    "shoesize" => fake()->numberBetween(35, 45),
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
            }
        }
    }
}
