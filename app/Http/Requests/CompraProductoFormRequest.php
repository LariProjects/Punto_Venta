<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraProductoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'COMPRA_ID' => 'required|exists:compras,id',
            'PRODUCTO_ID' => 'required|exists:productos,id',
            'monto_total' => 'required|numeric|min:0',
            'cant_comprada' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'COMPRA_ID.required' => 'La compra es obligatoria.',
            'PRODUCTO_ID.required' => 'El producto es obligatorio.',
            'monto_total.required' => 'El monto total es obligatorio.',
            'cant_comprada.required' => 'La cantidad comprada es obligatoria.',
        ];
    }
}
