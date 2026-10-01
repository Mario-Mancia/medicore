<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('login.index');
    }

    public function login(LoginRequest $request)
    {
        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->contrasenha
        ];

        if (Auth::attempt($credenciales, $request->boolean('remember'))) {
            $usuario = Auth::user();

            if (strtolower($usuario->estado->estado) !== 'activo') {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with("warning", "Su cuenta se encuentra inactiva, contacte al administrador.");
            }

            $usuario->update([
                'ultimo_inicio_sesion' => now(),
                'ultima_ip_inicio_sesion' => $request->ip()
            ]);

            $request->session()->regenerate();

            return redirect()->intended('home')->with("success", "Bienvenido de nuevo, " . $usuario->nombres);
        }

        return redirect()->route('login')->with("error", "Credenciales incorrectas. Verifique su correo o contraseña.");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with("success", "Sesión cerrada correctamente");
    }
}
