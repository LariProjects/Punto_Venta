<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rfc' => 'required|max:13',
            'nombre' => 'required|max:45',
            'direccion' => 'nullable|max:100',
            'telefono' => 'nullable|max:15',
        ];
    }

    public function messages(): array
    {
        return [
            'rfc.required' => 'El RFC es obligatorio.',
            'rfc.max' => 'El RFC no puede tener más de 13 caracteres.',
            'nombre.required' => 'El nombre del proveedor es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 45 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 100 caracteres.',
            'telefono.max' => 'El teléfono no puede tener más de 15 caracteres.',
        ];
    }
}
