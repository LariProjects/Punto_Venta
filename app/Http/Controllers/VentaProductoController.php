<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaProducto;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaProductoFormRequest;

class VentaProductoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(VentaProductoFormRequest $request)
    {
        $ventaProducto = new VentaProducto();
        $ventaProducto->VENTA_ID = $request->get('VENTA_ID');
        $ventaProducto->PRODUCTO_ID = $request->get('PRODUCTO_ID');
        $ventaProducto->monto_total = $request->get('monto_total');
        $ventaProducto->cant_vendida = $request->get('cant_vendida');
        $ventaProducto->save();

        return Redirect::to('almacen/venta_producto');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ventaProducto = VentaProducto::findOrFail($id);
        $ventas = Venta::all();
        $productos = Producto::all();

        return view('almacen.venta_producto.edit', [
            'ventaProducto' => $ventaProducto,
            'ventas' => $ventas,
            'productos' => $productos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VentaProductoFormRequest $request, $id)
    {
        $ventaProducto = VentaProducto::findOrFail($id);
        $ventaProducto->VENTA_ID = $request->get('VENTA_ID');
        $ventaProducto->PRODUCTO_ID = $request->get('PRODUCTO_ID');
        $ventaProducto->monto_total = $request->get('monto_total');
        $ventaProducto->cant_vendida = $request->get('cant_vendida');
        $ventaProducto->save();

        return Redirect::to('almacen/venta_producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ventaProducto = VentaProducto::findOrFail($id);
        $ventaProducto->delete();

        return Redirect::to('almacen/venta_producto');
    }
}
