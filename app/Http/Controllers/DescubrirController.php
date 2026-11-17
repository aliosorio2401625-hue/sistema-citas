<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DescubrirController extends Controller
{
    // Mostrar personas compatibles con las preferencias del usuario
    public function index()
    {
        $usuario = Auth::user();

        // Obtener el perfil del usuario que inició sesión
        $perfil = $usuario->profile;

        // Verificar que tenga un perfil completo
        if (!$perfil || !$perfil->genero || !$perfil->preferencia) {
            return redirect()->route('perfil.edit')
                ->with('success', 'Completa tu género y preferencias para descubrir personas.');
        }

        // Buscar usuarios que tengan perfiles
        $usuarios = User::with('profile')
            ->where('id', '!=', $usuario->id)
            ->whereHas('profile', function ($query) use ($perfil) {

                // Aplicar la preferencia del usuario actual
                if ($perfil->preferencia === 'hombres') {
                    $query->where('genero', 'hombre');
                } elseif ($perfil->preferencia === 'mujeres') {
                    $query->where('genero', 'mujer');
                } elseif ($perfil->preferencia === 'ambos') {
                    $query->whereIn('genero', ['hombre', 'mujer']);
                }

            })
            ->latest()
            ->get();

        return view('descubrir.index', compact('usuarios'));
    }
}


