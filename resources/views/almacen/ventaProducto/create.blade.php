@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo VentaProducto</h2>
    <form action="{{ route('ventaProducto.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="venta_id">Venta</label>
            <input type="text" name="venta_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <input type="text" name="producto_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cant_vendida">Cantidad Vendida</label>
            <input type="number" name="cant_vendida" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="monto_total">Monto Total</label>
            <input type="number" step="0.01" name="monto_total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
