<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $clientes = Cliente::where('rfc', 'LIKE', '%' . $query . '%')
                ->orderBy('rfc', 'desc')
                ->paginate(7);

            return view('almacen.cliente.index', [
                'clientes' => $clientes,
                'searchText' => $query
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('almacen.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteFormRequest $request)
    {
        $cliente = new Cliente();
        $cliente->rfc = $request->get('rfc');
        $cliente->nombre = $request->get('nombre');
        $cliente->save();

        return Redirect::to('almacen/cliente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('almacen.cliente.show', ['cliente' => Cliente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('almacen.cliente.edit', ['cliente' => Cliente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->rfc = $request->get('rfc');
        $cliente->nombre = $request->get('nombre');
        $cliente->save();

        return Redirect::to('almacen/cliente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return Redirect::to('almacen/cliente');
    }
}
