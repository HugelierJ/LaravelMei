<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = Role::all();//ophalen rollen uit DB
        User::all()->each(function ($user) use ($roles){
            if($user['id']==1){
                $user->roles()->sync([1]);
            }else{
                $user->roles()->sync([2]);
            }
        });
    }
}
