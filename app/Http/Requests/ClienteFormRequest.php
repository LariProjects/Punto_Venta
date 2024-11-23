<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rfc' => 'required|max:13',
            'nombre' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'rfc.required' => 'El RFC es obligatorio.',
            'rfc.max' => 'El RFC no puede tener más de 13 caracteres.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
        ];
    }
}
