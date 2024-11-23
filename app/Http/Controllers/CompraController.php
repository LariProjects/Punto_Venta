<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CompraFormRequest;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $compras = DB::table('compras')
                ->where('PROVEEDOR_rfc', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);

            return view('almacen.compra.index', [
                'compras' => $compras,
                'searchText' => $query
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener proveedores y productos para el formulario de compra
        $proveedores = Proveedor::all();
        $productos = Producto::all();

        return view("almacen.compra.create", [
            'proveedores' => $proveedores,
            'productos' => $productos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompraFormRequest $request)
    {
        // Crear la compra
        $compra = new Compra();
        $compra->PROVEEDOR_rfc = $request->get('PROVEEDOR_rfc');
        $compra->save();

        // Relacionar productos con la compra
        $productos = $request->get('productos');
        foreach ($productos as $productoId => $detalles) {
            $compra->productos()->attach($productoId, [
                'monto_total' => $detalles['monto_total'],
                'cant_comprada' => $detalles['cant_comprada'],
            ]);
        }

        return Redirect::to('almacen/compra');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("almacen.compra.show", ["compra" => Compra::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        $productos = Producto::all();

        return view("almacen.compra.edit", [
            'compra' => $compra,
            'proveedores' => $proveedores,
            'productos' => $productos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompraFormRequest $request, $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->PROVEEDOR_rfc = $request->get('PROVEEDOR_rfc');
        $compra->save();

        // Relacionar productos con la compra
        $productos = $request->get('productos');
        $compra->productos()->detach(); // Eliminar los productos previos

        foreach ($productos as $productoId => $detalles) {
            $compra->productos()->attach($productoId, [
                'monto_total' => $detalles['monto_total'],
                'cant_comprada' => $detalles['cant_comprada'],
            ]);
        }

        return Redirect::to('almacen/compra');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        return Redirect::to('almacen/compra');
    }
}
