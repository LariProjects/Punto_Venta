@extends('layouts.app')

@section('content')
    <h1>Editar Compra</h1>
    <form action="{{ route('compra.update', $compra->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="PROVEEDOR_rfc">Proveedor RFC:</label>
            <select name="PROVEEDOR_rfc" id="PROVEEDOR_rfc">
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->rfc }}"
                        {{ $proveedor->rfc == old('PROVEEDOR_rfc', $compra->PROVEEDOR_rfc) ? 'selected' : '' }}>
                        {{ $proveedor->rfc }} - {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="fecha_compra">Fecha de Compra:</label>
            <input type="date" name="fecha_compra" id="fecha_compra" value="{{ old('fecha_compra', $compra->fecha_compra) }}" required>
        </div>

        <div>
            <label for="total">Total:</label>
            <input type="number" step="0.01" name="total" id="total" value="{{ old('total', $compra->total) }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
@endsection
