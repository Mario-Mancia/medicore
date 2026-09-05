<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidades';

    protected $fillable = [
        'especialidad',
        'descripcion',
    ];

    private static function validaciones($id = null): array
    {
        return [
            'especialidad' => [
                'required',
                'string',
                'max:50',
            ],
            'descripcion' => [
                'nullable',
                'string',
                'max:250',
            ],
        ];
    }

    public static function validar(array $datos, $id = null): array
    {
        return Validator::make(
            $datos,
            static::validaciones($id)
        )->validate();
    }
}
