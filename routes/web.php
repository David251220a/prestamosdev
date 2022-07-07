<?php

use App\Http\Controllers\BienvienidoController;
use App\Http\Controllers\CobroController;
use App\Http\Controllers\LimpiarController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TasaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BienvienidoController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('bienvenido.index');

Route::get('prestamos/loan', [PrestamoController::class, 'loan'])->name('prestamos.loan');
Route::get('prestamos/consulta', [PrestamoController::class, 'consulta'])->name('prestamos.consulta');
Route::get('limpiar', [LimpiarController::class, 'limpiar'])->name('limpiar');
Route::get('cobros/control', [CobroController::class, 'config_general'])->name('cobros.control');
Route::put('cobros/control/{general}', [CobroController::class, 'config_general_actualizar'])->name('cobros.control.actualizar');

Route::resource('personas', PersonaController::class)->names('personas');
Route::resource('prestamos', PrestamoController::class)->names('prestamos');
Route::resource('tasas', TasaController::class)->names('tasas');
Route::resource('productos', ProductoController::class)->names('productos');
Route::resource('cobros', CobroController::class)->names('cobros');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
