@extends('layouts.app')

@section('content')
    <h1>Editar Teléfono</h1>

    <form action="{{ route('telefono.update', $telefono->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="proveedor_rfc">Proveedor RFC:</label>
            <input type="text" class="form-control" name="proveedor_rfc" value="{{ $telefono->proveedor->rfc }}" disabled>
        </div>

        <div class="form-group">
            <label for="numero">Número de Teléfono:</label>
            <input type="text" class="form-control" name="numero" value="{{ $telefono->numero }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control" name="descripcion" value="{{ $telefono->descripcion }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Teléfono</button>
    </form>
@endsection
