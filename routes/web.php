<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Rutas de inicio
Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');


// Rutas de usuario
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios');
