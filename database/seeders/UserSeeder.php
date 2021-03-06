<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos 10 usuarios de ejemplo:
        for ($i=0; $i < 10; $i++) { 
            $user = new User();
            $user->name = "Fulanito_".$i;
            $user->email = Str::random(10).'@gmail.com';
            $user->role = "cliente";
            $user->password = Hash::make('password');
            $user->save();
        }


    }
}
