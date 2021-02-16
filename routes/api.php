<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RelPePizController;
use App\Http\Controllers\RelPiIngController;
use App\Http\Controllers\UserController;
Use App\Models\Pedido;
Use App\Models\Pizza;
Use App\Models\Ingrediente;
Use App\Models\Rel_Pe_Piz;
Use App\Models\Rel_Pi_Ing;
Use App\Models\User;

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
 * Api para Usuarios:
 */
Route::get('usuarios', function() {
    return User::all();
});

Route::get('usuarios/{id}', function($id) {
    return User::find($id);
});

Route::get('/usuarios', [UserController::class,'index']);
Route::get('/usuarios/{user}', [UserController::class,'show']);

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
    $pizza = Pizza::find($id);
    $pizza->delete();

    return "La pizza ".$pizza->nombre." ha sido borrada con éxito";
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

/*
 * Api para Pedidos:
 */

Route::get('pedidos', function() {
    return Pedido::all();
});

Route::get('pedidos/{id}', function($id) {
    return Pedido::find($id);
});

Route::post('pedidos', function(Request $request) {
    return Pedido::store($request->all);
});

Route::put('pedidos/{id}', function(Request $request, $id) {
    $pedido = Pedido::findOrFail($id);
    $pedido->update($request->all());

    return $pedido;
});

Route::delete('pedidos/{id}', function($id) {
    $pedido = Pedido::find($id);
    $pedido->delete();

    return "El pedido con id ".$pedido->id." ha sido borrado con éxito";
});

Route::get('/pedidos', [PedidoController::class,'index']);
Route::get('/pedidos/{pedido}', [PedidoController::class,'show']);
Route::post('/pedidos', [PedidoController::class,'store']);
Route::put('/pedidos/{pedido}', [PedidoController::class,'update']);
Route::delete('/pedidos/{pedido}', [PedidoController::class,'delete']);

/*
 * Api para la Relación de pizzas y sus ingredientes:
 */

Route::get('ingredientes_pizza', function() {
    return Rel_Pi_Ing::all();
});

Route::get('ingredientes_pizza/{id}', function($id) {
    return Rel_Pi_Ing::find($id);
});

Route::post('ingredientes_pizza', function(Request $request) {
    return Rel_Pi_Ing::store($request->all);
});

Route::put('ingredientes_pizza/{id}', function(Request $request, $id) {
    $ingredientes_pizza = Rel_Pi_Ing::findOrFail($id);
    $ingredientes_pizza->update($request->all());

    return $ingredientes_pizza;
});

Route::delete('ingredientes_pizza/{id}', function($id) {
    $ingredientes_pizza = Rel_Pi_Ing::find($id);
    $pizza = Pizza::find($ingredientes_pizza->id_pizza);
    $ingrediente = Ingrediente::find($ingredientes_pizza->id_ingrediente);
    $ingredientes_pizza->delete();

    return "El ingrediente ".$ingrediente->nombre." de la pizza ".$pizza->nombre." se ha eliminado con éxito";
});

Route::get('/ingredientes_pizza', [RelPiIngController::class,'index']);
Route::get('/ingredientes_pizza/{ing_piz_id}', [RelPiIngController::class,'show']);
Route::post('/ingredientes_pizza', [RelPiIngController::class,'store']);
Route::put('/ingredientes_pizza/{ing_piz_id}', [RelPiIngController::class,'update']);
Route::delete('/ingredientes_pizza/{ing_piz_id}', [RelPiIngController::class,'delete']);

/*
 * Api para la Relación de pizzas solicitadas en cada pedido:
 */

Route::get('pizzas_pedido', function() {
    return Rel_Pe_Piz::all();
});

Route::get('pizzas_pedido/{id}', function($id) {
    return Rel_Pe_Piz::find($id);
});

Route::post('pizzas_pedido', function(Request $request) {
    return Rel_Pe_Piz::store($request->all);
});

Route::put('pizzas_pedido/{id}', function(Request $request, $id) {
    $pizzas_pedido = Rel_Pe_Piz::findOrFail($id);
    $pizzas_pedido->update($request->all());

    return $pizzas_pedido;
});

Route::delete('pizzas_pedido/{id}', function($id) {
    $pizzas_pedido = Rel_Pe_Piz::find($id);
    $pizza = Pizza::find($pizzas_pedido->id_pizza);
    $pizzas_pedido->delete();

    return "La pizza ".$pizza->nombre." del pedido con id ".$pizzas_pedido->id_pedido." se ha eliminado con éxito";
});

Route::get('/pizzas_pedido', [RelPePizController::class,'index']);
Route::get('/pizzas_pedido/{pe_piz_id}', [RelPePizController::class,'show']);
Route::post('/pizzas_pedido', [RelPePizController::class,'store']);
Route::put('/pizzas_pedido/{pe_piz_id}', [RelPePizController::class,'update']);
Route::delete('/pizzas_pedido/{pe_piz_id}', [RelPePizController::class,'delete']);