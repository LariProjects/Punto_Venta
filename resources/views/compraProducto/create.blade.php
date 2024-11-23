@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo CompraProducto</h2>
    <form action="{{ route('compraProducto.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="compra_id">Compra</label>
            <input type="text" name="compra_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <input type="text" name="producto_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cant_comprada">Cantidad Comprada</label>
            <input type="number" name="cant_comprada" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="monto_total">Monto Total</label>
            <input type="number" step="0.01" name="monto_total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
