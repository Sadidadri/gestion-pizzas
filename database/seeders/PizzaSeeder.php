<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ejemplos de pizzas
       $ingrediente = new Pizza();
       $ingrediente->nombre = "Pizza Margarita";
       $ingrediente->imagen = "pizza_margarita.jpg";
       $ingrediente->precio_base = 4.50;
       $ingrediente->save();

       $ingrediente = new Pizza();
       $ingrediente->nombre = "Pizza Cuatro Quesos";
       $ingrediente->imagen = "pizza_cuatro_quesos.jpg";
       $ingrediente->precio_base = 6.00;
       $ingrediente->save();

       $ingrediente = new Pizza();
       $ingrediente->nombre = "Pizza Barbacoa";
       $ingrediente->imagen = "pizza_barbacoa.jpg";
       $ingrediente->precio_base = 6.50;
       $ingrediente->save();
       
    }
}
