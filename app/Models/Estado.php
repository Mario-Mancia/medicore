<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $fillable = [
        'estado',
    ];

    protected $casts = [
        // De momento no hay campos que requieran conversión.
    ];

    private static function validaciones($id = null): array
    {
        return [
            'estado' => ['required', 'string', 'max:255'],
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
