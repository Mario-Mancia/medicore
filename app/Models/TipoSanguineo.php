<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class TipoSanguineo extends Model
{
    use HasFactory;

    protected $table = 'tipos_sanguineos';

    protected $fillable = [
        'tipo_sanguineo',
        'descripcion',
    ];

    private static function validaciones($id = null): array
    {
        return [
            'tipo_sanguineo' => [
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
