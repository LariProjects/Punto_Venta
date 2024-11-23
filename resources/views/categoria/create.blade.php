@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Categoría</h2>
    <form action="{{ route('categoria.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
