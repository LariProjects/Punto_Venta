@extends('layouts.app')

@section('content')
    <h1>Detalles del Producto</h1>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Categoría:</strong> {{ $producto->categoria->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $producto->precio }}</p>
    <a href="{{ route('producto.edit', $producto->id) }}">Editar</a>
    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
