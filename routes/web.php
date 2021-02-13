<?php

use Illuminate\Support\Facades\Route;

Auth::routes();




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 


Route::get('/pizzas', function () {
    return view('ver_pizzas');
})->where('any', '.*');

