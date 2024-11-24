@extends('layouts.app')

@section('content')
    <h1>Ventas</h1>

    <a href="{{ route('venta.create') }}" class="btn btn-primary">Nueva Venta</a>

    <form action="{{ route('venta.index') }}" method="GET" class="my-3">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por Cliente" class="form-control" style="width: 300px; display: inline;">
        <button type="submit" class="btn btn-secondary">Buscar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->cliente->nombre }}</td>
                    <td>{{ $venta->fecha }}</td>
                    <td>{{ $venta->total }}</td>
                    <td>
                        <a href="{{ route('venta.show', $venta->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('venta.edit', $venta->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $ventas->links() }}
@endsection
