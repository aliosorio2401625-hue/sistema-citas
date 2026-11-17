<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Rutas para gestionar perfiles
Route::middleware('auth')->group(function () {
    Route::get('/perfil/create', [ProfileController::class, 'create'])
        ->name('perfil.create');

    Route::post('/perfil', [ProfileController::class, 'store'])
        ->name('perfil.store');

    Route::get('/perfil/edit', [ProfileController::class, 'edit'])
        ->name('perfil.edit');

    Route::put('/perfil', [ProfileController::class, 'update'])
        ->name('perfil.update');
});

// Registro de usuarios
Route::get('/registro', [RegistroController::class, 'create'])
    ->name('registro.create');

Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');

// Mostrar usuarios registrados
Route::get('/perfiles', [RegistroController::class, 'index'])
    ->name('perfiles.index');

// Inicio de sesión
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->name('login.store');
});

// Cerrar sesión
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
