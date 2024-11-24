@extends('layouts.app')

@section('content')
    <h1>Detalles de la Venta</h1>

    <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }} ({{ $venta->cliente->rfc }})</p>
    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
    <p><strong>Total:</strong> {{ $venta->total }}</p>

    <h3>Productos Vendidos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cant_vendida }}</td>
                    <td>{{ $producto->pivot->monto_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('venta.index') }}" class="btn btn-secondary">Volver</a>
@endsection
