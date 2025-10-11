<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    /**
     * Mostrar lista de ambientes.
     */
    public function index()
    {
        $ambientes = Ambiente::all();
        return view('admin.ambientes.index', compact('ambientes'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('admin.ambientes.create');
    }

    /**
     * Guardar nuevo ambiente.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_ambiente' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $ambiente = new Ambiente();
        $ambiente->nombre = $request->nombre;
        $ambiente->tipo_ambiente = $request->tipo_ambiente;
        $ambiente->descripcion = $request->descripcion;
        $ambiente->save();

        return redirect('/admin/ambientes')
            ->with('success', 'Ambiente creado correctamente.');
    }

    /**
     * Mostrar detalles de un ambiente.
     */
    public function show($id)
    {
        $ambiente = Ambiente::findOrFail($id);
    
        return view('admin.ambientes.show', compact('ambiente'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit($id)
    {

        $ambiente = Ambiente::findOrFail($id);
        return view('admin.ambientes.edit', compact('ambiente'));
    }

    /**
     * Actualizar un ambiente.
     */
    public function update(Request $request, Ambiente $ambiente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_ambiente' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $ambiente->update([
            'nombre' => $request->nombre,
            'tipo_ambiente' => $request->tipo_ambiente,
            'descripcion' => $request->descripcion,
        ]);

        return redirect('/admin/ambientes')
            ->with('success', 'Ambiente actualizado correctamente.');
    }

    /**
     * Eliminar un ambiente.
     */
    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();

        return redirect('/admin/ambientes')
            ->with('success', 'Ambiente eliminado correctamente.');
    }
}
