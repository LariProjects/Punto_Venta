@extends('layouts.app')

@section('content')
    <h1>Registrar Nueva Venta</h1>

    <form action="{{ route('venta.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="cliente_rfc">Cliente RFC:</label>
            <input type="text" class="form-control" name="cliente_rfc" value="{{ old('cliente_rfc') }}" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" class="form-control" name="total" value="{{ old('total') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Venta</button>
    </form>
@endsection
