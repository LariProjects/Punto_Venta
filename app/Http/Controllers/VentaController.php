<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaFormRequest;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ventas = DB::table('ventas')
                ->where('CLIENTE_rfc', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);

            return view('almacen.venta.index', [
                'ventas' => $ventas,
                'searchText' => $query
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener clientes y productos para el formulario de venta
        $clientes = Cliente::all();
        $productos = Producto::all();

        return view("almacen.venta.create", [
            'clientes' => $clientes,
            'productos' => $productos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VentaFormRequest $request)
    {
        // Crear la venta
        $venta = new Venta();
        $venta->CLIENTE_rfc = $request->get('CLIENTE_rfc');
        $venta->save();

        // Relacionar productos con la venta
        $productos = $request->get('productos');
        foreach ($productos as $productoId => $detalles) {
            $venta->productos()->attach($productoId, [
                'monto_total' => $detalles['monto_total'],
                'cant_vendida' => $detalles['cant_vendida'],
            ]);
        }

        return Redirect::to('almacen/venta');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("almacen.venta.show", ["venta" => Venta::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::all();
        $productos = Producto::all();

        return view("almacen.venta.edit", [
            'venta' => $venta,
            'clientes' => $clientes,
            'productos' => $productos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VentaFormRequest $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->CLIENTE_rfc = $request->get('CLIENTE_rfc');
        $venta->save();

        // Relacionar productos con la venta
        $productos = $request->get('productos');
        $venta->productos()->detach(); // Eliminar los productos previos

        foreach ($productos as $productoId => $detalles) {
            $venta->productos()->attach($productoId, [
                'monto_total' => $detalles['monto_total'],
                'cant_vendida' => $detalles['cant_vendida'],
            ]);
        }

        return Redirect::to('almacen/venta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return Redirect::to('almacen/venta');
    }
}
