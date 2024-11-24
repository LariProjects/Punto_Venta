@extends('layouts.app')

@section('content')
    <h1>Detalles de Venta Producto</h1>

    <p><strong>Venta ID:</strong> {{ $ventaProducto->venta_id }}</p>
    <p><strong>Producto ID:</strong> {{ $ventaProducto->producto_id }}</p>
    <p><strong>Cantidad Vendida:</strong> {{ $ventaProducto->cant_vendida }}</p>
    <p><strong>Monto Total:</strong> {{ $ventaProducto->monto_total }}</p>

    <a href="{{ route('venta_producto.index') }}" class="btn btn-secondary">Volver</a>
@endsection
