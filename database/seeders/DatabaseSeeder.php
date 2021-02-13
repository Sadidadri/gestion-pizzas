<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(IngredienteSeeder::class);
        $this->call(PizzaSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(Rel_Pi_IngSeeder::class);
        $this->call(Rel_Pe_PizSeeder::class);
        $this->call(RoleUserSeeder::class);
    }
}
