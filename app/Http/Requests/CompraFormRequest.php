<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'PROVEEDOR_rfc' => 'required|exists:proveedores,rfc',
            'productos' => 'required|array',
            'productos.*.monto_total' => 'required|numeric|min:0',
            'productos.*.cant_comprada' => 'required|integer|min:1',
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
            'productos.required' => 'Debe seleccionar al menos un producto.',
            'productos.*.monto_total.required' => 'El monto total del producto es obligatorio.',
            'productos.*.monto_total.numeric' => 'El monto total debe ser un número.',
            'productos.*.monto_total.min' => 'El monto total debe ser mayor o igual a 0.',
            'productos.*.cant_comprada.required' => 'La cantidad comprada es obligatoria.',
            'productos.*.cant_comprada.integer' => 'La cantidad comprada debe ser un número entero.',
            'productos.*.cant_comprada.min' => 'La cantidad comprada debe ser al menos 1.',
        ];
    }
}
