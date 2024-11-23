<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $producto = DB::table('productos')->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')->paginate(7);
            return view('almacen.producto.index', [
                'producto' => $producto,
                'searchText' => $query
            ]);
        }
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view("almacen.producto.create", compact('categorias'));
    }

    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->get('nombre');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->precio = $request->get('precio');
        $producto->stock = $request->get('stock');
        $producto->save();
        return Redirect::to('almacen/producto');
    }

    public function show($id)
    {
        return view("almacen.producto.show", ["producto" => Producto::findOrFail($id)]);
    }

    public function edit($id)
    {
        $categorias = Categoria::all();
        return view("almacen.producto.edit", ["producto" => Producto::findOrFail($id)], compact('categorias'));
    }

    public function update(ProductoFormRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->get('nombre');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->precio = $request->get('precio');
        $producto->stock = $request->get('stock');
        $producto->save();
        return Redirect::to('almacen/producto');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return Redirect::to('almacen/producto');
    }
}
