@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Teléfono</h2>
    <form action="{{ route('telefono.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="PROVEEDOR_rfc">RFC Proveedor</label>
            <select name="PROVEEDOR_rfc" class="form-control" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->rfc }}">{{ $proveedor->rfc }} - {{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" name="numero" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
