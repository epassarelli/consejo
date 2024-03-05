<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComposicionController;
use App\Http\Controllers\OrdendeldiaController;
use App\Http\Controllers\ActasController;
use App\Http\Controllers\ReglamentosController;
use App\Http\Controllers\BuscadorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/composicion', [ComposicionController::class, 'index'])->name('composicion');

Route::get('/orden-del-dia', [OrdendeldiaController::class, 'index'])->name('OrdendelDia');
Route::get('/orden-del-dia/{fecha}',[OrdendeldiaController::class, 'Sesiones']);
Route::get('/sesiones-anteriores/{fecha}',[OrdendeldiaController::class, 'SesionesAnteriores'])->name('SesionesAnteriores');
Route::get('/actas', [ActasController::class, 'index'])->name('actas');
Route::get('/reglamentos', [ReglamentosController::class, 'index'])->name('reglamentos');
Route::get('/buscador', [BuscadorController::class, 'index'])->name('buscador');

