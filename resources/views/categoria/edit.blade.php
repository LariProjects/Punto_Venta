@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Categoría</h2>
    <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $categoria->categoria }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
