<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Tiposblog;
use App\Http\Livewire\Admin\Blogs;
use App\Http\Livewire\Admin\Eventos;

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
Route::get('/tiposblog', Tiposblog::class)->name('tiposblog');
Route::get('/blogs', Blogs::class)->name('blogs');
Route::get('/eventos', Eventos::class)->name('eventos');
