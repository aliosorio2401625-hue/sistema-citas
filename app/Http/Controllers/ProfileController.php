<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Mostrar formulario para crear perfil
    public function create()
    {
        return view('profiles.create');
    }

    // Guardar perfil del usuario
    public function store(Request $request)
    {
        $datos = $request->validate([
            'edad' => 'nullable|integer|min:1|max:120',
            'descripcion' => 'nullable|string|max:1000',
            'intereses' => 'nullable|string|max:1000',
        ]);

        Auth::user()->profile()->create($datos);

        return redirect()->route('inicio')
            ->with('success', 'Tu perfil se ha creado correctamente.');
    }

    // Mostrar formulario para editar perfil
    public function edit()
    {
        $perfil = Auth::user()->profile;

        if (!$perfil) {
            return redirect()->route('perfil.create');
        }

        return view('profiles.edit', compact('perfil'));
    }

    // Actualizar perfil
    public function update(Request $request)
    {
        $datos = $request->validate([
            'edad' => 'nullable|integer|min:1|max:120',
            'descripcion' => 'nullable|string|max:1000',
            'intereses' => 'nullable|string|max:1000',
        ]);

        Auth::user()->profile()->update($datos);

        return redirect()->route('inicio')
            ->with('success', 'Tu perfil se ha actualizado correctamente.');
    }
}
