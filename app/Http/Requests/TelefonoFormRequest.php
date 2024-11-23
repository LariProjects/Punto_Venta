<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefonoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'PROVEEDOR_rfc' => 'required|exists:proveedores,rfc',
            'numero' => 'required|string|max:15',
        ];
    }

    /**
     * Customize the validation messages.
     */
    public function messages()
    {
        return [
            'PROVEEDOR_rfc.required' => 'El RFC del proveedor es obligatorio.',
            'PROVEEDOR_rfc.exists' => 'El proveedor con el RFC proporcionado no existe.',
            'numero.required' => 'El número de teléfono es obligatorio.',
            'numero.max' => 'El número de teléfono no puede tener más de 15 caracteres.',
        ];
    }
}
