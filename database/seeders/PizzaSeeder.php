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
       $pizza = new Pizza();
       $pizza->nombre = "Pizza Margarita";
       $pizza->imagen = "pizza_margarita.jpg";
       $pizza->precio_base = 4.50;
       $pizza->save();

       $pizza = new Pizza();
       $pizza->nombre = "Pizza Cuatro Quesos";
       $pizza->imagen = "pizza_cuatro_quesos.jpg";
       $pizza->precio_base = 6.00;
       $pizza->save();

       $pizza = new Pizza();
       $pizza->nombre = "Pizza Barbacoa";
       $pizza->imagen = "pizza_barbacoa.jpg";
       $pizza->precio_base = 6.50;
       $pizza->save();
       
       $pizza = new Pizza();
       $pizza->nombre = "Pizza Honolulu";
       $pizza->imagen = "pizza_honolulu.jpg";
       $pizza->precio_base = 6.00;
       $pizza->save();

       $pizza = new Pizza();
       $pizza->nombre = "Pizza Carbonara";
       $pizza->imagen = "pizza_carbonara.jpg";
       $pizza->precio_base = 6.50;
       $pizza->save();

       $pizza = new Pizza();
       $pizza->nombre = "Pizza Pimentera";
       $pizza->imagen = "pizza_pimentera.jpg";
       $pizza->precio_base = 6.00;
       $pizza->save();
    }
}
