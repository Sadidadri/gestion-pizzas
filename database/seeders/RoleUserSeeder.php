<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos roles de usuario por defecto
        $role = Role::create(['name' => 'cliente']);
        $role = Role::create(['name' => 'admin']);
        
    }
}
