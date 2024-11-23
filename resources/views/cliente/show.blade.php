@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Cliente</h2>
    <p><strong>RFC:</strong> {{ $cliente->rfc }}</p>
    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Correo:</strong> {{ $cliente->correo }}</p>
    <a href="{{ route('cliente.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection
