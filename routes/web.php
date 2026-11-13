
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


    
    