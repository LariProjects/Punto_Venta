@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Cliente</h2>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
