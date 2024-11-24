@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>
    <form action="{{ route('cliente.update', $cliente->rfc) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" value="{{ $cliente->rfc }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ $cliente->correo }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
