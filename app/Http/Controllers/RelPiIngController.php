<?php

namespace App\Http\Controllers;

use App\Models\Rel_Pi_Ing;
use Illuminate\Http\Request;

class RelPiIngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rel_Pi_Ing::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientes_pizza = Rel_Pi_Ing::create($request->all());

        return response()->json($ingredientes_pizza, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rel_Pi_Ing  $ingredientes_pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Rel_Pi_Ing $ingredientes_pizza)
    {
        return $ingredientes_pizza;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rel_Pi_Ing  $ingredientes_pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rel_Pi_Ing $ingredientes_pizza)
    {
        $ingredientes_pizza->update($request->all());

        return response()->json($ingredientes_pizza, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rel_Pi_Ing  $pizza
     * @return \Illuminate\Http\Response
     */
    public function delete(Rel_Pi_Ing $ingredientes_pizza)
    {
        $ingredientes_pizza->delete();

        return response()->json(null, 204);
    }
}

