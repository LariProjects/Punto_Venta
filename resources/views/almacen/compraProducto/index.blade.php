@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Compra Productos</h2>
    <form action="{{ route('compraProducto.index') }}" method="GET">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por Compra o Producto">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('compraProducto.create') }}" class="btn btn-primary">Nuevo CompraProducto</a>

    <table class="table">
        <thead>
            <tr>
                <th>Compra</th>
                <th>Producto</th>
                <th>Cantidad Comprada</th>
                <th>Monto Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compraProductos as $compraProducto)
            <tr>
                <td>{{ $compraProducto->compra_id }}</td>
                <td>{{ $compraProducto->producto_id }}</td>
                <td>{{ $compraProducto->cant_comprada }}</td>
                <td>{{ $compraProducto->monto_total }}</td>
                <td>
                    <a href="{{ route('compraProducto.edit', $compraProducto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('compraProducto.destroy', $compraProducto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $compraProductos->links() }}
</div>
@endsection
