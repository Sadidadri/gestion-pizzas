<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rel_Pe_Piz;


class Rel_Pe_PizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
        *Obtenemos ids de las pizzas:
        */ 

        //Pizza margarita:
        $id_pizza_margarita= DB::select("select id from pizzas where nombre = 'Pizza Margarita'")[0]->id;
        //Pizza cuatro quesos:
        $id_pizza_cuatro_quesos = DB::select("select id from pizzas where nombre = 'Pizza Cuatro Quesos'")[0]->id;
        //Pizza barbacoa:
        $id_pizza_barbacoa = DB::select("select id from pizzas where nombre = 'Pizza Barbacoa'")[0]->id;

        //Elaboracion del contenido de varios pedidos de ejemplo:
        
        /*
        *  Contenido Pedido 1:
        */
        
        //Articulo 1: 2 Pizzas Margarita pequeñas con masa clasica 9€
        $contenido = new Rel_Pe_Piz();
        $contenido->id_pedido = 1;
        $contenido->id_pizza = $id_pizza_margarita;
        $contenido->cantidad = 2;
        $contenido->tamagno = "Pequeña";
        $contenido->tipo_masa = "Clasica";
        $contenido->save();
        //Articulo 2: 1 Pizza Mediana Barbacoa 6.50€
        $contenido = new Rel_Pe_Piz();
        $contenido->id_pedido = 1;
        $contenido->id_pizza = $id_pizza_barbacoa;
        $contenido->cantidad = 1;
        $contenido->tamagno = "Mediana";
        $contenido->tipo_masa = "Clasica";
        $contenido->save();

        /*
        *  Contenido Pedido 2:
        */
        //Articulo 1: 2 Pizzas Cuatro Quesos pequeñas con masa clasica 12€
        $contenido = new Rel_Pe_Piz();
        $contenido->id_pedido = 2;
        $contenido->id_pizza = $id_pizza_cuatro_quesos;
        $contenido->cantidad = 2;
        $contenido->tamagno = "Pequeña";
        $contenido->tipo_masa = "Clasica";
        $contenido->save();


        /*
        *  Contenido Pedido 3:
        */
        //Articulo 1: 2 Pizzas Barbacoa pequeñas con masa estadounidense 15€
        $contenido = new Rel_Pe_Piz();
        $contenido->id_pedido = 3;
        $contenido->id_pizza = $id_pizza_barbacoa;
        $contenido->cantidad = 2;
        $contenido->tamagno = "Pequeña";
        $contenido->tipo_masa = "Estadounidense";
        $contenido->save();

        /*
        *  Contenido Pedido 4:
        */
        //Articulo 1: 1 Pizza margarita familiar
        $contenido = new Rel_Pe_Piz();
        $contenido->id_pedido = 4;
        $contenido->id_pizza = $id_pizza_margarita;
        $contenido->cantidad = 1;
        $contenido->tamagno = "Familiar";
        $contenido->tipo_masa = "Clasica";
        $contenido->save();
    }
}
