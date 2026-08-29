<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'rol',
    ];

    protected $casts = [
        // De momento no hay campos que requieran conversión explícita.
    ];

    private static function validaciones($id = null): array
    {
        return [
            'rol' => ['required', 'string', 'max:255'],
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
