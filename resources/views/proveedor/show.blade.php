@extends('layouts.app')

@section('content')
    <h1>Detalles del Proveedor</h1>

    <p><strong>RFC:</strong> {{ $proveedor->rfc }}</p>
    <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
    <p><strong>Teléfono(s):</strong>
        <ul>
            @foreach ($proveedor->telefonos as $telefono)
                <li>{{ $telefono->numero }}</li>
            @endforeach
        </ul>
    </p>

    <a href="{{ route('proveedor.edit', $proveedor->rfc) }}">Editar</a>
@endsection
