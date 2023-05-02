<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 50; $i++) {
            $userIds = User::pluck("id")->toArray();

            $cart = new Cart();
            $cart->user_id = fake()
                ->unique()
                ->randomElement($userIds);
            $cart->save();
        }
    }
}
