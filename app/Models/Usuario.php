<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User as Authenticatable;
use voku\helper\ASCII;

class Usuario extends Authenticatable
{
    //use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'id_rol',
        'id_estado',
        'nombres',
        'apellidos',
        'correo',
        'contrasenha',
        'telefono',
        'ultima_ip_inicio_sesion',
        'ultimo_inicio_sesion',
    ];

    protected $casts = [
        'id_rol' => 'integer',
        'id_estado' => 'integer',
        'ultimo_inicio_sesion' => 'datetime',
        'contrasenha' => 'hashed',
    ];

    public static function validaciones($id = null): array
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
                Rule::unique('usuarios', 'correo')->ignore($id, 'id_usuario')
            ],
            'contrasenha' => [$id ? 'nullable' : 'required', 'string', 'max:250'],
            'telefono' => ['nullable', 'string', 'max:25'],
            'ultima_ip_inicio_sesion' => ['nullable', 'ip'],
            'ultimo_inicio_sesion' => ['nullable', 'date']
        ];
    }

    public static function rules(array $datos, $id = null): array
    {
        return Validator::make($datos, static::validaciones($id))->validate();
    }

    public static function loginRules(): array
    {
        return [
            'correo' => [
                'required',
                'email',
                'max:150'
            ],
            'contrasenha' => [
                'required',
                'string',
            ]
        ];
    }

    public function getAuthPasswordName(): string
    {
        return 'contrasenha';
    }

    public function getAuthPassword(): string
    {
        return $this->contrasenha;
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }

    // LECTURA
    public static function mostrarTodos(): Collection
    {
        return Usuario::with(['rol', 'estado'])->orderBy('id_usuario', 'ASC')->get();
    }

    public static function contarTodos(): int
    {
        return Usuario::count();
    }

    // INSERTAR
    public static function insertar($datos): Usuario
    {
        return Usuario::create($datos);
    }

    // MODIFICAR
    public static function buscarXId(int $id): ?Usuario
    {
        return Usuario::find($id);
    }

    public static function actualizar($datos, $id): bool
    {
        return Usuario::find($id)->update($datos);
    }

    // ELIMINAR
    public static function eliminar(int $id): bool
    {
        return Usuario::find($id)->delete();
    }
}
