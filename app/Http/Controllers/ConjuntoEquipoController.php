<?php

namespace App\Http\Controllers;

use App\Models\ConjuntoEquipo;
use Illuminate\Http\Request;

class ConjuntoEquipoController extends Controller
{
    /**
     * Mostrar todos los conjuntos registrados.
     */
    public function index()
    {
        $conjuntos = ConjuntoEquipo::all();
        return view('admin.conjuntos.index', compact('conjuntos'));
    }

    /**
     * Mostrar formulario de creación de conjunto.
     */
    public function create()
    {
        return view('admin.conjuntos.create');
    }

    /**
     * Guardar un nuevo conjunto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_conjunto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $conjunto = new ConjuntoEquipo();
        $conjunto->nombre_conjunto = $request->nombre_conjunto;
        $conjunto->descripcion = $request->descripcion;
        $conjunto->save();

        return redirect()->route('conjuntos.index')
            ->with('mensaje', 'Conjunto creado correctamente.')->with('icono', 'success');
    }

    /**
     * Mostrar los detalles de un conjunto.
     */
    public function show(ConjuntoEquipo $conjuntoEquipo)
    {
        return view('admin.conjuntos.show', compact('conjuntoEquipo'));
    }

    /**
     * Mostrar formulario de edición de un conjunto.
     */
    public function edit(ConjuntoEquipo $conjuntoEquipo)
    {
        return view('admin.conjuntos.edit', compact('conjuntoEquipo'));
    }

    /**
     * Actualizar los datos de un conjunto.
     */
    public function update(Request $request, ConjuntoEquipo $conjuntoEquipo)
    {
        $request->validate([
            'nombre_conjunto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $conjuntoEquipo->update([
            'nombre_conjunto' => $request->nombre_conjunto,
            'descripcion' => $request->descripcion,
        ]);

           return redirect()->route('conjuntos.index')
            ->with('mensaje', 'Conjunto creado correctamente.')->with('icono', 'success');
    }

    /**
     * Eliminar un conjunto.
     */
    public function destroy(ConjuntoEquipo $conjuntoEquipo)
    {
        $conjuntoEquipo->delete();

        return redirect('/admin/conjuntos')
            ->with('success', 'Conjunto eliminado correctamente.');
    }
}
