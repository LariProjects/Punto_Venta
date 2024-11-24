@extends('layouts.app')

@section('content')
    <h1>Editar Venta Producto</h1>

    <form action="{{ route('venta_producto.update', $ventaProducto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="venta_id">Venta ID:</label>
            <input type="text" class="form-control" name="venta_id" value="{{ $ventaProducto->venta_id }}" disabled>
        </div>

        <div class="form-group">
            <label for="producto_id">Producto ID:</label>
            <input type="text" class="form-control" name="producto_id" value="{{ $ventaProducto->producto_id }}" disabled>
        </div>

        <div class="form-group">
            <label for="cant_vendida">Cantidad Vendida:</label>
            <input type="number" class="form-control" name="cant_vendida" value="{{ $ventaProducto->cant_vendida }}" required>
        </div>

        <div class="form-group">
            <label for="monto_total">Monto Total:</label>
            <input type="number" class="form-control" name="monto_total" value="{{ $ventaProducto->monto_total }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Venta Producto</button>
    </form>
@endsection
