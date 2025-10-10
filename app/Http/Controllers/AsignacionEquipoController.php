<?php

namespace App\Http\Controllers;

use App\Models\AsignacionEquipo;
use App\Models\Producto;
use Illuminate\Http\Request;

class AsignacionEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.asignaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $asignacionEquipo)
    {
        return view('admin.asignaciones.show', compact('asignacionEquipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsignacionEquipo $asignacionEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsignacionEquipo $asignacionEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsignacionEquipo $asignacionEquipo)
    {
        //
    }

  
}
