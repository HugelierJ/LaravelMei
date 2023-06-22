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
        $users = User::all();

        foreach ($users as $user) {
            $address = new Address();
            $address->user_id = $user->id;
            $address->name = fake()->streetName . " " . fake()->buildingNumber;
            $address->city = fake()->city;
            $address->state = fake()->country;
            $address->zip_code = fake()->postcode;
            $address->created_at = now();
            $address->updated_at = now();
            $address->save();
        }
    }
}
