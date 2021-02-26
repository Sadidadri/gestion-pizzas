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
    return view('logoutadmin');
})->middleware('web');

//Página de registro
Route::get('/register', function () {
    return view('register');
})->middleware('web');
 

//Vista de Admin
Route::get('/administrador', function () {
    return view('administrador');
})->middleware('web');

/**
 * Vistas CRUD Pizzas
 */
Route::get('/administrador/pizzas', function () {
    return view('ver_pizzas');
});

Route::get('/administrador/pizzas/new', function () {
    return view('crear_pizzas');
});
Route::get('/administrador/pizzas/{id}/edit', function () {
    return view('crear_pizzas');
})->where('id', '\d');

/**
 * Vistas CRUD ingredientes
 */
Route::get('/administrador/ingredientes', function () {
    return view('ver_ingredientes');
});

Route::get('/administrador/pedidos', function () {
    return view('ver_pedidos');
});

/**
 * Vistas CRUD Ingredientes asociados a las pizzas
 */
Route::get('/administrador/ingredientes_pizza', function () {
    return view('ver_ingredientes_pizza');
});

Route::get('/administrador/ingredientes_pizza/new', function () {
    return view('crear_ingredientes_pizza');
});

Route::get('/administrador/ingredientes_pizza/{id}/edit', function () {
    return view('editar_ingredientes_pizza');
})->where('id', '\d');


Route::get('/administrador/pizzas_pedido', function () {
    return view('ver_pizzas_pedido');
});



