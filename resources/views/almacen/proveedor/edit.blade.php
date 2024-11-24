@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Proveedor</h2>
    <form action="{{ route('proveedor.update', $proveedor->rfc) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" value="{{ $proveedor->rfc }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $proveedor->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
