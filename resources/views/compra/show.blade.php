@extends('layouts.app')

@section('content')
    <h1>Detalles de la Compra</h1>
    <p><strong>Proveedor:</strong> {{ $compra->proveedor->nombre }}</p>
    <p><strong>Fecha:</strong> {{ $compra->fecha }}</p>
    <h3>Productos Comprados:</h3>
    <ul>
        @foreach($compra->productos as $producto)
            <li>{{ $producto->nombre }} (Cantidad: {{ $producto->pivot->cant_comprada }})</li>
        @endforeach
    </ul>
    <a href="{{ route('compra.edit', $compra->id) }}">Editar</a>
    <form action="{{ route('compra.destroy', $compra->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
