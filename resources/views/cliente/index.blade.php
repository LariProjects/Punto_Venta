@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Clientes</h2>
    <form action="{{ route('cliente.index') }}" method="GET">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por RFC o Nombre">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('cliente.create') }}" class="btn btn-primary">Nuevo Cliente</a>

    <table class="table">
        <thead>
            <tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->rfc }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>
                    <a href="{{ route('cliente.edit', $cliente->rfc) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('cliente.destroy', $cliente->rfc) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clientes->links() }}
</div>
@endsection
