<?php

use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubcategoriaController;
use App\Models\Models\Stock;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/', InicioController::class);

Route::resource('categoria', CategoriaController::class);

Route::resource('subcategoria', SubcategoriaController::class);

Route::resource('artigo', ArtigoController::class);

Route::resource('stock', StockController::class);

require __DIR__.'/auth.php';
