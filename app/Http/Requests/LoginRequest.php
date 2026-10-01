<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return Usuario::loginRules();
    }

    public function messages(): array
    {
        return [
            'correo.required' => 'El correo electrónico es requerido para iniciar sesión.',
            'correo.email' => 'El formato del correo electrónico no es válido.',
            'correo.max' => 'El correo no debe exceder los 150 caracteres.',

            'contrasenha.required' => 'La contraseña es requerida para acceder.'
        ];
    }

    public function attributes(): array
    {
        return [
            'correo' => 'Correo electrónico de usuario',
            'contrasenha' => 'Contraseña'
        ];
    }
}
