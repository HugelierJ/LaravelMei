<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->insert([
            "is_active" => 1,
            "username" => "Vertuoso",
            "first_name" => "Jason",
            "last_name" => "Hugelier",
            "email" => "hugelierjason@gmail.com",
            "email_verified_at" => Carbon::now()->format("Y-m-d H:i:s"),
            "photo_id" => 1,
            "password" => bcrypt(12345678),
            "gender_id" => 1,
            "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            "updated_at" => Carbon::now()->format("Y-m-d H:i:s"),
        ]);
        User::factory(50)->create();
        // Assign gender to users
        $users = User::all();
        $genderIds = Gender::pluck("id");

        $users->each(function ($user) use ($genderIds) {
            $randomGenderId = $genderIds->random();
            $gender = Gender::find($randomGenderId);
            $user->gender()->associate($gender);
            $user->save();
            if ($user->id == 1) {
                $user->gender()->associate(1);
                $user->save();
            }
        });
    }
}
