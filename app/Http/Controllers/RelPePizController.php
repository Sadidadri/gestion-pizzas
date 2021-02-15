<?php

namespace App\Http\Controllers;

use App\Models\Rel_Pe_Piz;
use Illuminate\Http\Request;

class RelPePizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rel_Pe_Piz::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pizzas_pedido = Rel_Pe_Piz::create($request->all());

        return response()->json($pizzas_pedido, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rel_Pe_Piz  $pizzas_pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Rel_Pe_Piz $pizzas_pedido)
    {
        return $pizzas_pedido;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rel_Pe_Piz  $pizzas_pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rel_Pe_Piz $pizzas_pedido)
    {
        $pizzas_pedido->update($request->all());

        return response()->json($pizzas_pedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rel_Pe_Piz  $pizza
     * @return \Illuminate\Http\Response
     */
    public function delete(Rel_Pe_Piz $pizzas_pedido)
    {
        $pizzas_pedido->delete();

        return response()->json(null, 204);
    }
}

