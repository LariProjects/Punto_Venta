@extends('layouts.app')

@section('content')
    <h1>Detalles del Teléfono</h1>

    <p><strong>Proveedor RFC:</strong> {{ $telefono->proveedor->rfc }}</p>
    <p><strong>Teléfono:</strong> {{ $telefono->numero }}</p>
    <p><strong>Descripción:</strong> {{ $telefono->descripcion }}</p>

    <a href="{{ route('telefono.edit', $telefono->id) }}">Editar</a>
@endsection
