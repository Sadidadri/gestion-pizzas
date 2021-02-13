<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
Use App\Models\Pizza;
Use App\Models\Ingrediente;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Api para Pizzas:

Route::get('pizzas', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Pizza::all();
});

Route::get('pizzas/{id}', function($id) {
    return Pizza::find($id);
});

Route::post('pizzas', function(Request $request) {
    return Pizza::store($request->all);
});

Route::put('pizzas/{id}', function(Request $request, $id) {
    $pizza = Pizza::findOrFail($id);
    $pizza->update($request->all());

    return $pizza;
});

Route::delete('pizzas/{id}', function($id) {
    Pizza::find($id)->delete();

    return 204;
});

Route::get('/pizzas', [PizzaController::class,'index']);
Route::get('/pizzas/{pizza}', [PizzaController::class,'show']);
Route::post('/pizzas', [PizzaController::class,'store']);
Route::put('/pizzas/{pizza}', [PizzaController::class,'update']);
Route::delete('/pizzas/{pizza}', [PizzaController::class,'delete']);