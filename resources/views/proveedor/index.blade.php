@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Proveedores</h2>
    <form action="{{ route('proveedor.index') }}" method="GET">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por RFC o Nombre">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('proveedor.create') }}" class="btn btn-primary">Nuevo Proveedor</a>

    <table class="table">
        <thead>
            <tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->rfc }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>
                    <a href="{{ route('proveedor.edit', $proveedor->rfc) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('proveedor.destroy', $proveedor->rfc) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $proveedores->links() }}
</div>
@endsection
