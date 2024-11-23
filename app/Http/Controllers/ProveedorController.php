<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorFormRequest;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $proveedor = DB::table('proveedores')->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('rfc', 'desc')->paginate(7);
            return view('almacen.proveedor.index', [
                'proveedor' => $proveedor,
                'searchText' => $query
            ]);
        }
    }

    public function create()
    {
        return view("almacen.proveedor.create");
    }

    public function store(ProveedorFormRequest $request)
    {
        $proveedor = new Proveedor;
        $proveedor->rfc = $request->get('rfc');
        $proveedor->nombre = $request->get('nombre');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->save();
        return Redirect::to('almacen/proveedor');
    }

    public function show($id)
    {
        return view("almacen.proveedor.show", ["proveedor" => Proveedor::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.proveedor.edit", ["proveedor" => Proveedor::findOrFail($id)]);
    }

    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->rfc = $request->get('rfc');
        $proveedor->nombre = $request->get('nombre');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->save();
        return Redirect::to('almacen/proveedor');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return Redirect::to('almacen/proveedor');
    }
}
