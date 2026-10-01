<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;




Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
// Rutas de inicio
Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');

// Rutas de usuario
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios');
Route::post('usuarios', [UsuarioController::class, 'insertarUsuario'])->name('usuarios.insertar');
Route::get('usuarios/{id}/buscar', [UsuarioController::class, 'buscarUsuarioXId'])->name('usuarios.buscar');
Route::put('usuarios/{usuario}', [UsuarioController::class, 'actualizarUsuario'])->name('usuarios.actualizar');
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'eliminarUsuario'])->name('usuarios.eliminar');
// });


