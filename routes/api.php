<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredienteController;
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


/*
 * Api para Pizzas:
 */

Route::get('pizzas', function() {
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

/*
 * Api para Ingredientes:
 */

Route::get('ingredientes', function() {
    return Ingrediente::all();
});

Route::get('ingredientes/{id}', function($id) {
    return Ingrediente::find($id);
});

Route::post('ingredientes', function(Request $request) {
    return Ingrediente::store($request->all);
});

Route::put('ingredientes/{id}', function(Request $request, $id) {
    $ingrediente = Ingrediente::findOrFail($id);
    $ingrediente->update($request->all());

    return $ingrediente;
});

Route::delete('ingredientes/{id}', function($id) {
    $ingrediente = Ingrediente::find($id);
    $ingrediente->delete();

    return "El ingrediente ".$ingrediente->nombre." ha sido borrado con éxito";
});

Route::get('/ingredientes', [IngredienteController::class,'index']);
Route::get('/ingredientes/{ingrediente}', [IngredienteController::class,'show']);
Route::post('/ingredientes', [IngredienteController::class,'store']);
Route::put('/ingredientes/{ingrediente}', [IngredienteController::class,'update']);
Route::delete('/ingredientes/{ingrediente}', [IngredienteController::class,'delete']);