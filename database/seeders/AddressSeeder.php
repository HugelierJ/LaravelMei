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
            $numAddresses = fake()->numberBetween(1, 2);
            $addresses = [];

            for ($i = 0; $i < $numAddresses; $i++) {
                $address = new Address();
                $address->name =
                    fake()->streetName . " " . fake()->buildingNumber;
                $address->city = fake()->city;
                $address->state = fake()->country;
                $address->zip_code = fake()->postcode;
                $address->created_at = now();
                $address->updated_at = now();
                $address->save();
                $addresses[] = $address->id;
            }
            $user->addresses()->attach($addresses);
        }
    }
}
