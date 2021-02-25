<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/



//Página de inicio
Route::get('/', function () {
    return view('home');
})->middleware('web');
//Pagina de inicio de sesion
Route::get('/login', function () {
    return view('login');
})->middleware('web');
//Página de cierre de sesión
Route::get('/logout', function () {
    return view('logout');
})->middleware('web');

//Página de registro
Route::get('/register', function () {
    return view('register');
})->middleware('web');
 

//Prueba de vue
//Route::get('{any}', function () {
//    return view('app');
//})->where('any', '.*');

/**
 * Vistas CRUD Pizzas
 */
Route::get('/pizzas', function () {
    return view('ver_pizzas');
});

Route::get('/pizzas/new', function () {
    return view('crear_pizzas');
});
Route::get('/pizzas/{id}/edit', function () {
    return view('crear_pizzas');
})->where('id', '\d');

/**
 * Vistas CRUD ingredientes
 */
Route::get('/ingredientes', function () {
    return view('ver_ingredientes');
});

Route::get('/pedidos', function () {
    return view('ver_pedidos');
});

/**
 * Vistas CRUD Ingredientes asociados a las pizzas
 */
Route::get('/ingredientes_pizza', function () {
    return view('ver_ingredientes_pizza');
});

Route::get('/ingredientes_pizza/new', function () {
    return view('crear_ingredientes_pizza');
});

Route::get('/ingredientes_pizza/{id}/edit', function () {
    return view('editar_ingredientes_pizza');
})->where('id', '\d');


Route::get('/pizzas_pedido', function () {
    return view('ver_pizzas_pedido');
});



