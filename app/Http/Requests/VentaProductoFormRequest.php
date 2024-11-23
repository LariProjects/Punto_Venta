<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaProductoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'VENTA_ID' => 'required|exists:ventas,id',
            'PRODUCTO_ID' => 'required|exists:productos,id',
            'monto_total' => 'required|numeric|min:0',
            'cant_vendida' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'VENTA_ID.required' => 'La venta es obligatoria.',
            'PRODUCTO_ID.required' => 'El producto es obligatorio.',
            'monto_total.required' => 'El monto total es obligatorio.',
            'cant_vendida.required' => 'La cantidad vendida es obligatoria.',
        ];
    }
}
