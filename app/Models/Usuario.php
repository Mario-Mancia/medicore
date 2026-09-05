<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Usuario extends Model
{
    //use HasFactory;

    // Regla 1: Especificar el nombre de la tabla
    protected $table = 'usuarios';

    // (Extra necesario) Especificar la clave primaria ya que no es 'id'
    protected $primaryKey = 'id_usuario';

    // Regla 2: Campos de asignación masiva (Fillable)
    // Excluimos id_usuario, ultimo_inicio_sesion y los timestamps creados por Laravel
    protected $fillable = [
        'id_rol',
        'id_estado',
        'nombres',
        'apellidos',
        'correo',
        'contrasenha',
        'telefono',
        'ultima_ip_inicio_sesion',
    ];

    // Regla 3: Conversiones explícitas (Casts) para los que no son strings
    protected $casts = [
        'id_rol' => 'integer',
        'id_estado' => 'integer',
        'ultimo_inicio_sesion' => 'datetime',
        'contrasenha' => 'hashed', // Laravel 10+ recomienda 'hashed' para encriptar contraseñas automáticamente
    ];

    // Regla 4: Función que determine las reglas de validación
    private static function validaciones($id = null): array
    {
        return [
            'id_rol' => ['required', 'integer', 'exists:roles,id_rol'],
            'id_estado' => ['required', 'integer', 'exists:estados,id_estado'],
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'correo' => [
                'required',
                'string',
                'email',
                'max:150',
                // La siguiente regla verifica que el correo sea único, pero ignora el ID si estamos actualizando
                Rule::unique('usuarios', 'correo')->ignore($id, 'id_usuario')
            ],
            // Si hay un $id (update), la contraseña es opcional, si no (create), es requerida
            'contrasenha' => [$id ? 'nullable' : 'required', 'string', 'max:250'],
            'telefono' => ['nullable', 'string', 'max:25'],
            'ultima_ip_inicio_sesion' => ['nullable', 'ip'],
            'ultimo_inicio_sesion' => ['nullable', 'date']
        ];
    }

    // Regla 5: Función que utilice las reglas de validación
    public static function validar(array $datos, $id = null): array
    {
        return Validator::make($datos, static::validaciones($id))->validate();
    }

    // Regla 6: Relaciones con otras tablas
    public function rol()
    {
        // belongsTo(Modelo, foreign_key, owner_key)
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }

    // Funciones de CRUD

    public static function mostrarTodos(): Collection {
        return Usuario::with('rol', 'estado')->get();
    }
}
