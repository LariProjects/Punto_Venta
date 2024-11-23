@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>
    <a href="{{ route('producto.create') }}">Crear Nuevo Producto</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        <a href="{{ route('producto.edit', $producto->id) }}">Editar</a>
                        <form action="{{ route('producto.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
