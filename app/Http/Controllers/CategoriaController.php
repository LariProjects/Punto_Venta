<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categoria = DB::table('categorias') // Cambié 'categoria' a 'categorias'
                ->where('categoria', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('almacen.categoria.index', [
                'categoria' => $categoria,
                'searchText' => $query
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("almacen.categoria.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaFormRequest $request)
    {
        $categoria = new Categoria;
        $categoria->categoria = $request->get('descripcion'); // Cambié 'Categoria' a 'categoria'
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("almacen.categoria.show", ["categoria" => Categoria::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("almacen.categoria.edit", ["categoria" => Categoria::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->categoria = $request->get('descripcion'); // Cambié 'Categoria' a 'categoria'
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return Redirect::to('almacen/categoria');
    }
}