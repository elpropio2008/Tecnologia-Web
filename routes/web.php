<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
<i class="fa-solid fa-house"></i>
<i class="fa-solid fa-house-user"></i>
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/',[HomeController::class,'index'])->name('admin.home');
//Route::get('',[HomeController::class,'index'])->name('admin.home');

//Route::get('/', InicioController::class);

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('admin.Inicio.index');
    })->name('admin.home');
});
