@extends('layouts.app')

@section('content')
    <h1>Detalles de la Compra de Producto</h1>

    <p><strong>Compra ID:</strong> {{ $compraProducto->COMPRA_ID }}</p>
    <p><strong>Producto ID:</strong> {{ $compraProducto->PRODUCTO_ID }}</p>
    <p><strong>Monto Total:</strong> ${{ number_format($compraProducto->monto_total, 2) }}</p>
    <p><strong>Cantidad Comprada:</strong> {{ $compraProducto->cant_comprada }}</p>

    <a href="{{ route('compraProducto.edit', $compraProducto->id) }}">Editar</a>
@endsection
