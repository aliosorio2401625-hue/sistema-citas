<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    // Mostrar el formulario
    public function create()
    {
        return view('formulario.create');
    }

    // Guardar un usuario en la base de datos
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);

        return redirect()->route('perfiles.index')
            ->with('success', 'Usuario registrado correctamente.');
    }

    // Consultar los usuarios registrados
    public function index()
    {
        $usuarios = User::latest()->get();

        return view('formulario.index', compact('usuarios'));
    }
}
