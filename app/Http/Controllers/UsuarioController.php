<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarUsuarioRequest;
use App\Http\Requests\InsertarUsuarioRequest;
use App\Models\Estado;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = [
            "usuarios" => Usuario::mostrarTodos(),
            "roles" => Rol::mostrarTodos(),
            "estados" => Estado::mostrarTodos(),
        ];
        return view('usuario.usuarios', $datos);
    }

    public function insertarUsuario(InsertarUsuarioRequest $request)
    {
        $datos = $request->validated();

        $datos['contrasenha'] = bcrypt($datos['contrasenha']);

        Usuario::insertar($datos);

        return redirect()->route('usuarios')->with('success', 'Usuario insertado correctamente');
    }

    public function buscarUsuarioXId(int $id)
    {
        return response()->json(Usuario::buscarXId($id));
    }

    public function actualizarUsuario(ActualizarUsuarioRequest $request, Usuario $usuario)
    {
        if (Usuario::actualizar($request->validated(), $usuario->getKey())) {
            return redirect()->route('usuarios')->with('success', 'Usuario actualizado correctamente');
        }
        return redirect()->route('usuarios')->with('error', 'Usuario no actualizado');
    }

    public function eliminarUsuario(Usuario $usuario)
    {
        if (Usuario::eliminar($usuario->getKey())) {
            return redirect()->route('usuarios')->with('success', 'Usuario eliminado correctamente');
        }
        return redirect()->route('usuarios')->with('error', 'Usuario no eliminado');
    }

}
