@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Compra</h1>
    <form action="{{ route('compra.store') }}" method="POST">
        @csrf
        <div>
            <label for="proveedor_id">Proveedor:</label>
            <select name="proveedor_id" id="proveedor_id">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->rfc }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
@endsection
