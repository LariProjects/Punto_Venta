@extends('layouts.app')

@section('content')
    <h1>Editar Venta</h1>

    <form action="{{ route('venta.update', $venta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cliente_rfc">Cliente RFC:</label>
            <input type="text" class="form-control" name="cliente_rfc" value="{{ $venta->cliente->rfc }}" disabled>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="{{ $venta->fecha }}" required>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" class="form-control" name="total" value="{{ $venta->total }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Venta</button>
    </form>
@endsection
