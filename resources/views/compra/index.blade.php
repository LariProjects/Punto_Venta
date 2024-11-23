@extends('layouts.app')

@section('content')
    <h1>Lista de Compras</h1>
    <a href="{{ route('compra.create') }}">Crear Nueva Compra</a>
    <table>
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->proveedor->nombre }}</td>
                    <td>{{ $compra->fecha }}</td>
                    <td>
                        <a href="{{ route('compra.show', $compra->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
