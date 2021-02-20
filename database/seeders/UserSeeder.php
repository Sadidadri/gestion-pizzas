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
            $user->name = Str::random(10);
            $user->email = Str::random(10).'@gmail.com';
            $user->role = "cliente";
            $user->password = Hash::make('password');
            $user->save();
        }

        //y estos para usarlos de prueba
        $user = new User();
        $user->name = "adri_cliente";
        $user->email = 'adricliente@gmail.com';
        $user->role = "cliente";
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = "adri_admin";
        $user->email = 'adriadmin@gmail.com';
        $user->role = "admin";
        $user->password = Hash::make('password');
        $user->save();


    }
}
