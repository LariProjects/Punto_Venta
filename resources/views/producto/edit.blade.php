@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <form action="{{ route('producto.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required>
        </div>
        <div>
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" required>
        </div>
        <button type="submit">Actualizar</button>
    </form>
@endsection
