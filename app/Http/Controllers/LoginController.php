
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar formulario de inicio de sesión
    public function create()
    {
        return view('auth.login');
    }

    // Comprobar los datos del usuario
    public function store(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credenciales)) {

            // Regenerar la sesión por seguridad
            $request->session()->regenerate();

            return redirect()->route('inicio')
                ->with('success', 'Bienvenido. Has iniciado sesión correctamente.');
        }

        return back()
            ->withErrors([
                'email' => 'El correo o la contraseña son incorrectos.',
            ])
            ->onlyInput('email');
    }

    // Cerrar sesión
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('inicio')
            ->with('success', 'Has cerrado sesión correctamente.');
    }
}

