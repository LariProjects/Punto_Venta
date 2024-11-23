@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Categorías</h2>
    <form action="{{ route('categoria.index') }}" method="GET">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por nombre">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Nueva Categoría</a>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoria as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->categoria }}</td>
                <td>
                    <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('categoria.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categoria->links() }}
</div>
@endsection
