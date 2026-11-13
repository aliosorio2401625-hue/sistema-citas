<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario', function () {
    return view('formulario.index');
});

Route::get('/formulario', function () {
    return view('formulario.create');
});


use App\Http\Controllers\RegistroController;

Route::get('/registro', [RegistroController::class, 'create'])
    ->name('registro.create');

Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');
    