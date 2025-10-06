<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use PhpParser\Node\Stmt\Return_;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categorias = Categoria::all();
        //return response()->json($categorias);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index')
        ->with('mensaje', 'Categoría creada exitosamente.')
         ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($idcategoria)
    {
        $categoria = Categoria::findOrFail($idcategoria);
        return view('admin.categorias.show', compact('categoria')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idcategoria)
    {
        $categoria = Categoria::findOrFail($idcategoria);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idcategoria)
    {

       
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($idcategoria);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index')
        ->with('mensaje', 'Categoría actualizada exitosamente.')
         ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Request $request, $id)
{
    $categoria = Categoria::findOrFail($id);

    if ($request->accion === 'cambiar_estado') {
        $categoria->estado = 'inactivo';
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('mensaje', 'Categoría desactivada exitosamente.')
            ->with('icono', 'info');
    }

    // Acción por defecto: eliminar
    $categoria->delete();

    return redirect()->route('categorias.index')
        ->with('mensaje', 'Categoría eliminada exitosamente.')
        ->with('icono', 'success');
}

}
