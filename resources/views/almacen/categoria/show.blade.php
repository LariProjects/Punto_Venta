@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles de Categoría</h2>
    <p><strong>Descripción:</strong> {{ $categoria->categoria }}</p>
    <a href="{{ route('categoria.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection
