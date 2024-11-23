@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Producto</h1>
    <form action="{{ route('producto.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
@endsection
