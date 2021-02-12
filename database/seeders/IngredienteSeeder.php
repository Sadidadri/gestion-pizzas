<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insertar ingredientes de ejemplo

        //Salsas
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Salsa de Tomate";
        $ingrediente->categoria = "salsas";
        $ingrediente->imagen = "salsa_tomate.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Salsa de Barbacoa";
        $ingrediente->categoria = "salsas";
        $ingrediente->imagen = "salsa_barbacoa.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Salsa de Gaucha";
        $ingrediente->categoria = "salsas";
        $ingrediente->imagen = "salsa_gaucha.jpg";
        $ingrediente->save();
       
        //Quesos
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Mozarella";
        $ingrediente->categoria = "quesos";
        $ingrediente->imagen = "mozarella.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Cheddar";
        $ingrediente->categoria = "quesos";
        $ingrediente->imagen = "cheddar.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Queso azul";
        $ingrediente->categoria = "quesos";
        $ingrediente->imagen = "queso_azul.jpg";
        $ingrediente->save();
        
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Provolone";
        $ingrediente->categoria = "quesos";
        $ingrediente->imagen = "provolone.jpg";
        $ingrediente->save();

        //Verduras
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Albahaca";
        $ingrediente->categoria = "verdura";
        $ingrediente->imagen = "albahaca.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Cebolla";
        $ingrediente->categoria = "verdura";
        $ingrediente->imagen = "cebolla.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Pimiento verde";
        $ingrediente->categoria = "verdura";
        $ingrediente->imagen = "pimiento_verde.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Pimiento rojo";
        $ingrediente->categoria = "verdura";
        $ingrediente->imagen = "pimiento_rojo.jpg";
        $ingrediente->save();

        
        //Carnes
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Ternera";
        $ingrediente->categoria = "carne";
        $ingrediente->imagen = "pollo.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Bacon";
        $ingrediente->categoria = "carne";
        $ingrediente->imagen = "bacon.jpg";
        $ingrediente->save();

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = "Pollo";
        $ingrediente->categoria = "carne";
        $ingrediente->imagen = "pollo.jpg";
        $ingrediente->save();
    }
}
