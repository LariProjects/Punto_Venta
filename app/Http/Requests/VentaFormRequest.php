<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
            'CLIENTE_rfc' => 'required|exists:clientes,rfc',
            'productos' => 'required|array',
            'productos.*.monto_total' => 'required|numeric|min:0',
            'productos.*.cant_vendida' => 'required|integer|min:1',
        ];
    }

    /**
     * Customize the validation messages.
     */
    public function messages()
    {
        return [
            'CLIENTE_rfc.required' => 'El RFC del cliente es obligatorio.',
            'CLIENTE_rfc.exists' => 'El cliente con el RFC proporcionado no existe.',
            'productos.required' => 'Debe seleccionar al menos un producto.',
            'productos.*.monto_total.required' => 'El monto total del producto es obligatorio.',
            'productos.*.monto_total.numeric' => 'El monto total debe ser un número.',
            'productos.*.monto_total.min' => 'El monto total debe ser mayor o igual a 0.',
            'productos.*.cant_vendida.required' => 'La cantidad vendida es obligatoria.',
            'productos.*.cant_vendida.integer' => 'La cantidad vendida debe ser un número entero.',
            'productos.*.cant_vendida.min' => 'La cantidad vendida debe ser al menos 1.',
        ];
    }
}
