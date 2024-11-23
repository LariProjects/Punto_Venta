@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Teléfonos</h2>
    <form action="{{ route('telefono.index') }}" method="GET">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por RFC de proveedor">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('telefono.create') }}" class="btn btn-primary">Nuevo Teléfono</a>

    <table class="table">
        <thead>
            <tr>
                <th>RFC Proveedor</th>
                <th>Número</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($telefonos as $telefono)
            <tr>
                <td>{{ $telefono->PROVEEDOR_rfc }}</td>
                <td>{{ $telefono->numero }}</td>
                <td>
                    <a href="{{ route('telefono.edit', $telefono->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('telefono.destroy', $telefono->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $telefonos->links() }}
</div>
@endsection
