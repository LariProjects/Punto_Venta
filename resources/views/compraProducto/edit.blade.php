@extends('layouts.app')

@section('content')
    <h1>Editar Compra de Producto</h1>
    <form action="{{ route('compraProducto.update', $compraProducto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="COMPRA_ID">Compra:</label>
            <select name="COMPRA_ID" id="COMPRA_ID">
                @foreach ($compras as $compra)
                    <option value="{{ $compra->id }}"
                        {{ $compra->id == old('COMPRA_ID', $compraProducto->COMPRA_ID) ? 'selected' : '' }}>
                        {{ $compra->id }} - {{ $compra->PROVEEDOR_rfc }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="PRODUCTO_ID">Producto:</label>
            <select name="PRODUCTO_ID" id="PRODUCTO_ID">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}"
                        {{ $producto->id == old('PRODUCTO_ID', $compraProducto->PRODUCTO_ID) ? 'selected' : '' }}>
                        {{ $producto->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="monto_total">Monto Total:</label>
            <input type="number" step="0.01" name="monto_total" id="monto_total" value="{{ old('monto_total', $compraProducto->monto_total) }}" required>
        </div>

        <div>
            <label for="cant_comprada">Cantidad Comprada:</label>
            <input type="number" name="cant_comprada" id="cant_comprada" value="{{ old('cant_comprada', $compraProducto->cant_comprada) }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
@endsection
