
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Mostrar formulario de registro
Route::get('/registro', [RegistroController::class, 'create'])
    ->name('registro.create');

// Guardar usuario
Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');

// Mostrar usuarios registrados
Route::get('/perfiles', [RegistroController::class, 'index'])
    ->name('perfiles.index');


use App\Http\Controllers\LoginController;

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
    