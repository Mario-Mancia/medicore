<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUsuarioRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return (new InsertarUsuarioRequest())->messages();
    }

    public function attributes(): array
    {
        return (new InsertarUsuarioRequest())->attributes();
    }
}
