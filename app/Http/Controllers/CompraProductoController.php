<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompraProducto;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CompraProductoFormRequest;

class CompraProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $compraProductos = CompraProducto::where('COMPRA_ID', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);

            return view('almacen.compra_producto.index', [
                'compraProductos' => $compraProductos,
                'searchText' => $query
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompraProductoFormRequest $request)
    {
        $compraProducto = new CompraProducto();
        $compraProducto->COMPRA_ID = $request->get('COMPRA_ID');
        $compraProducto->PRODUCTO_ID = $request->get('PRODUCTO_ID');
        $compraProducto->monto_total = $request->get('monto_total');
        $compraProducto->cant_comprada = $request->get('cant_comprada');
        $compraProducto->save();

        return Redirect::to('almacen/compra_producto');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compraProducto = CompraProducto::findOrFail($id);
        $compras = Compra::all();
        $productos = Producto::all();

        return view('almacen.compra_producto.edit', [
            'compraProducto' => $compraProducto,
            'compras' => $compras,
            'productos' => $productos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompraProductoFormRequest $request, $id)
    {
        $compraProducto = CompraProducto::findOrFail($id);
        $compraProducto->COMPRA_ID = $request->get('COMPRA_ID');
        $compraProducto->PRODUCTO_ID = $request->get('PRODUCTO_ID');
        $compraProducto->monto_total = $request->get('monto_total');
        $compraProducto->cant_comprada = $request->get('cant_comprada');
        $compraProducto->save();

        return Redirect::to('almacen/compra_producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compraProducto = CompraProducto::findOrFail($id);
        $compraProducto->delete();

        return Redirect::to('almacen/compra_producto');
    }
}
