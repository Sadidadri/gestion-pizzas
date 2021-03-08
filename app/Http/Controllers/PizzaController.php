<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Models\Rel_Pi_Ing;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pizza::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pizza = Pizza::create($request->all());

        return response()->json($pizza, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        return $pizza;
    }

    /**
     * Obtiene los ingredientes de la pizza dada y los devuelve en una cadena
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public static function getIngredientes(Pizza $pizza)
    {
        $ingredientes = [];

        $relaciones = Rel_Pi_Ing::where('id_pizza',$pizza["id"])->get();

        foreach ($relaciones as $relacion) {
            array_push($ingredientes,Ingrediente::where('id',$relacion["id_ingrediente"])->get()[0]);
        }


        return $ingredientes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        $pizza->update($request->all());

        return response()->json($pizza, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function delete(Pizza $pizza)
    {
        $pizza->delete();

        return response()->json(null, 204);
    }
}
