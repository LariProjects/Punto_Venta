<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefono;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TelefonoFormRequest;
use Illuminate\Support\Facades\DB;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $telefonos = DB::table('telefonos')
                ->where('PROVEEDOR_rfc', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);

            return view('almacen.telefono.index', [
                'telefonos' => $telefonos,
                'searchText' => $query
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener proveedores para el formulario
        $proveedores = Proveedor::all();
        return view("almacen.telefono.create", ['proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TelefonoFormRequest $request)
    {
        $telefono = new Telefono();
        $telefono->PROVEEDOR_rfc = $request->get('PROVEEDOR_rfc');
        $telefono->numero = $request->get('numero');
        $telefono->save();

        return Redirect::to('almacen/telefono');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("almacen.telefono.show", ["telefono" => Telefono::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $telefono = Telefono::findOrFail($id);
        $proveedores = Proveedor::all();

        return view("almacen.telefono.edit", [
            'telefono' => $telefono,
            'proveedores' => $proveedores
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TelefonoFormRequest $request, $id)
    {
        $telefono = Telefono::findOrFail($id);
        $telefono->PROVEEDOR_rfc = $request->get('PROVEEDOR_rfc');
        $telefono->numero = $request->get('numero');
        $telefono->save();

        return Redirect::to('almacen/telefono');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $telefono = Telefono::findOrFail($id);
        $telefono->delete();

        return Redirect::to('almacen/telefono');
    }
}
