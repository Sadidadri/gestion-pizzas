<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rel_Pi_Ing;

class Rel_Pi_IngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        *Obtenemos ids de los ingredientes:
        */ 

        //Salsa tomate:
        $id_salsa_tomate= DB::select("select id from ingredientes where nombre = 'Salsa de Tomate'")[0]->id;
        //Salsa barbacoa:
        $id_salsa_barbacoa= DB::select("select id from ingredientes where nombre = 'Salsa de Barbacoa'")[0]->id;
        //Salsa de nata:
        $id_salsa_nata= DB::select("select id from ingredientes where nombre = 'Salsa de Nata'")[0]->id;
        //Queso mozarella:
        $id_mozarella= DB::select("select id from ingredientes where nombre = 'Mozarella'")[0]->id;
        //Queso provolone:
        $id_provolone= DB::select("select id from ingredientes where nombre = 'Provolone'")[0]->id;
        //Queso queso_azul:
        $id_queso_azul= DB::select("select id from ingredientes where nombre = 'Queso azul'")[0]->id;
        //Queso cheddar:
        $id_cheddar= DB::select("select id from ingredientes where nombre = 'Cheddar'")[0]->id;
        //Albahaca:
        $id_albahaca= DB::select("select id from ingredientes where nombre = 'Albahaca'")[0]->id;
        //Cebolla:
        $id_cebolla= DB::select("select id from ingredientes where nombre = 'Cebolla'")[0]->id;
        //Champiñón:
        $id_champignon= DB::select("select id from ingredientes where nombre = 'Champiñón'")[0]->id;
        //Pimiento verde:
        $id_pimiento_verde = DB::select("select id from ingredientes where nombre = 'Pimiento verde'")[0]->id;
        //Pimiento rojo:
        $id_pimiento_rojo = DB::select("select id from ingredientes where nombre = 'Pimiento rojo'")[0]->id;
        //Piña:
        $id_pigna = DB::select("select id from ingredientes where nombre = 'Piña'")[0]->id;
        //Bacon:
        $id_bacon= DB::select("select id from ingredientes where nombre = 'Bacon'")[0]->id;
        //Jamon york:
        $id_jamon_york= DB::select("select id from ingredientes where nombre = 'Jamón de York'")[0]->id;
        //Pollo:
        $id_pollo= DB::select("select id from ingredientes where nombre = 'Pollo'")[0]->id;
        //Ternera:
        $id_ternera= DB::select("select id from ingredientes where nombre = 'Ternera'")[0]->id;

        /*
        *Obtenemos ids de las pizzas:
        */ 

        //Pizza margarita:
        $id_pizza_margarita= DB::select("select id from pizzas where nombre = 'Pizza Margarita'")[0]->id;
        //Pizza cuatro quesos:
        $id_pizza_cuatro_quesos= DB::select("select id from pizzas where nombre = 'Pizza Cuatro Quesos'")[0]->id;
        //Pizza barbacoa:
        $id_pizza_barbacoa= DB::select("select id from pizzas where nombre = 'Pizza Barbacoa'")[0]->id;
        //Pizza honolulu:
        $id_pizza_honolulu= DB::select("select id from pizzas where nombre = 'Pizza Honolulu'")[0]->id;
        //Pizza carbonara:
        $id_pizza_carbonara= DB::select("select id from pizzas where nombre = 'Pizza Carbonara'")[0]->id;
        //Pizza pimentera:
        $id_pizza_pimentera= DB::select("select id from pizzas where nombre = 'Pizza Pimentera'")[0]->id;
        
        /*
        *Inserta ingredientes en la Pizza Margarita:
        */
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_margarita;
        $relacion->id_ingrediente = $id_salsa_tomate;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_margarita;
        $relacion->id_ingrediente = $id_mozarella;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_margarita;
        $relacion->id_ingrediente = $id_albahaca;
        $relacion->save();

        /*
        *Inserta ingredientes en la Pizza Cuatro Quesos:
        */
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_cuatro_quesos;
        $relacion->id_ingrediente = $id_salsa_tomate;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_cuatro_quesos;
        $relacion->id_ingrediente = $id_mozarella;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_cuatro_quesos;
        $relacion->id_ingrediente = $id_queso_azul;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_cuatro_quesos;
        $relacion->id_ingrediente = $id_provolone;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_cuatro_quesos;
        $relacion->id_ingrediente = $id_cheddar;
        $relacion->save();

        /*
        *Inserta ingredientes en la Pizza Barbacoa:
        */
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_barbacoa;
        $relacion->id_ingrediente = $id_salsa_barbacoa;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_barbacoa;
        $relacion->id_ingrediente = $id_mozarella;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_barbacoa;
        $relacion->id_ingrediente = $id_cebolla;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_barbacoa;
        $relacion->id_ingrediente = $id_pollo;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_barbacoa;
        $relacion->id_ingrediente = $id_ternera;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_barbacoa;
        $relacion->id_ingrediente = $id_bacon;
        $relacion->save();
        
        /*
        *Inserta ingredientes en la Pizza Honolulu:
        */
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_honolulu;
        $relacion->id_ingrediente = $id_salsa_tomate;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_honolulu;
        $relacion->id_ingrediente = $id_mozarella;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_honolulu;
        $relacion->id_ingrediente = $id_pigna;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_honolulu;
        $relacion->id_ingrediente = $id_jamon_york;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_honolulu;
        $relacion->id_ingrediente = $id_bacon;
        $relacion->save();

        /*
        *Inserta ingredientes en la Pizza Carbonara:
        */
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_carbonara;
        $relacion->id_ingrediente = $id_salsa_nata;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_carbonara;
        $relacion->id_ingrediente = $id_mozarella;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_carbonara;
        $relacion->id_ingrediente = $id_cebolla;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_carbonara;
        $relacion->id_ingrediente = $id_jamon_york;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_carbonara;
        $relacion->id_ingrediente = $id_bacon;
        $relacion->save();

        /*
        *Inserta ingredientes en la Pizza Pimentera:
        */
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_salsa_tomate;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_mozarella;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_cebolla;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_jamon_york;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_champignon;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_pimiento_verde;
        $relacion->save();
        $relacion = new Rel_Pi_Ing();
        $relacion->id_pizza = $id_pizza_pimentera;
        $relacion->id_ingrediente = $id_pimiento_rojo;
        $relacion->save();

    }
}
