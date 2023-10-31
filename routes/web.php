<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComposicionController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\RegistrateController;
use App\Http\Controllers\EllosTambienController;
use App\Http\Controllers\HacesFaltaController;

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
