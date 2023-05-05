<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = count(User::all());

        for ($i = 1; $i < $count; $i++) {
            $address = new Address();
            $address->user_id = $i;
            $address->home_address = fake()->address();
            if ($i % 2 == 0) {
                $address->secondary_address = fake()->address();
            }
            $address->city = fake()->city();
            $address->state = fake()->country();
            $address->zip_code = fake()->postcode();
            $address->type = fake()->word();
            if ($i % 2 == 0) {
                $address->is_billing_address = false;
            } else {
                $address->is_billing_address = true;
            }
            $address->created_at = now();
            $address->updated_at = now();
            $address->save();
        }
    }
}
