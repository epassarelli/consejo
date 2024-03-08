<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\GestionComisiones;
use App\Http\Livewire\Admin\GestionSesiones;
use App\Http\Livewire\Admin\OrdenesDelDia;
use App\Http\Livewire\Admin\TemarioOrdenDia;
use App\Http\Livewire\Admin\Temas;
use App\Http\Livewire\Admin\ItemsTemario;
use App\Http\Livewire\Admin\PresentesSesion;

use App\Http\Controllers\PdfController;



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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/roles', Roles::class)->name('roles');
Route::get('/users', Users::class)->name('users');
Route::get('/comisiones', GestionComisiones::class)->name('comisiones');
Route::get('/sesiones', GestionSesiones::class)->name('sesiones');
Route::get('/temas', Temas::class)->name('temas');
Route::get('/temarios', TemarioOrdenDia::class)->name('temarios');
Route::get('/items', ItemsTemario::class)->name('items'); // /{id}/{tema}
Route::get('/ordenes', OrdenesDelDia::class)->name('ordenes'); // /{id}
Route::get('/presentes-sesion', PresentesSesion::class)->name('asistentes'); // /{id}
Route::get('/generate-pdf/{id}', [PdfController::class, 'generatePdf']);
Route::get('/descargar-pdf',[PdfController::class, 'descargarPDF']);
