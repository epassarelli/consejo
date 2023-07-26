<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\RolesController;
use App\Models\Role;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/admin', 'Admin\DashboardController@index')->name('admin.dashboard');
Route::get('/admin', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
Route::get('/admin/roles', RolesController::class)->name('roles');
