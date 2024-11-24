@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Venta Productos</h2>
    <form action="{{ route('ventaProducto.index') }}" method="GET">
        <input type="text" name="searchText" value="{{ $searchText }}" placeholder="Buscar por Venta o Producto">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('ventaProducto.create') }}" class="btn btn-primary">Nuevo VentaProducto</a>

    <table class="table">
        <thead>
            <tr>
                <th>Venta</th>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Monto Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventaProductos as $ventaProducto)
            <tr>
                <td>{{ $ventaProducto->venta_id }}</td>
                <td>{{ $ventaProducto->producto_id }}</td>
                <td>{{ $ventaProducto->cant_vendida }}</td>
                <td>{{ $ventaProducto->monto_total }}</td>
                <td>
                    <a href="{{ route('ventaProducto.edit', $ventaProducto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ventaProducto.destroy', $ventaProducto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $ventaProductos->links() }}
</div>
@endsection
