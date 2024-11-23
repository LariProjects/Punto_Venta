<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CompraProductoController;
use App\Http\Controllers\VentaProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;


/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('almacen/categoria', CategoriaController::class);
Route::resource('almacen/producto', ProductoController::class);
Route::resource('almacen/venta', VentaController::class);
Route::resource('almacen/compra', CompraController::class);
Route::resource('almacen/compra_producto', CompraProductoController::class);
Route::resource('almacen/venta_producto', VentaProductoController::class);
Route::resource('almacen/proveedor', ProveedorController::class);
Route::resource('almacen/telefono', TelefonoController::class);
Route::resource('almacen/cliente', ClienteController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
