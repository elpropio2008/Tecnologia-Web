<?php

use App\Http\Controllers\Admin\EscenasController;
use App\Http\Controllers\Admin\Evidencias;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OficialesController;
use App\Http\Controllers\Admin\OperativoController;
use App\Http\Controllers\Admin\PersonasController;
use App\Http\Controllers\Admin\RegistrarDenunciasController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\TiposController;
use App\Http\Controllers\UsuariosController;

//Route::get('',[HomeController::class,'index'])->name('admin.home');
Route::resource('inicio',PersonasController::class)->names('admin.inicio');

Route::resource('Oficiales',OficialesController::class)->names('admin.Oficiales');
Route::resource('Registro', RegistrarDenunciasController::class)->names('admin.registro');
Route::resource('Operativos',OperativoController::class)->names('admin.operativo');
Route::resource('Evidencias',Evidencias::class)->names('admin.evidencia');
Route::resource('Escenas',EscenasController::class)->names('admin.escenas');
Route::resource('Usuarios',UsuariosController::class)->names('admin.usuarios');
Route::resource('Tipos',TiposController::class)->names('admin.tipos');
Route::resource('Rol',RolController::class)->names('admin.rol');