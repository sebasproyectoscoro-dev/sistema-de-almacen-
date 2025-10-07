<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    // Validación de los datos
    $request->validate([
        'idcategoria' => 'required|exists:categorias,id',
        'codigo'       => 'required|unique:productos,codigo',
        'nombre'       => 'required|string|max:255',
        'descripcion'  => 'required|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'precio_compra'=> 'required|numeric',
        'precio_venta' => 'required|numeric',
        'stock_minimo' => 'required|integer',
        'stock_maximo' => 'required|integer',
        'unidad_medida'=> 'required|string',
        'estado'       => 'required|boolean',
    ]);

    // Crear un nuevo producto
    $producto = new Producto();
    $producto->idcategoria  = $request->idcategoria;
    $producto->codigo        = $request->codigo;
    $producto->nombre        = $request->nombre;
    $producto->descripcion   = $request->descripcion;

    // Guardar imagen en storage/app/public/imagenes/productos
    if ($request->hasFile('imagen')) {
        $producto->imagen = $request->file('imagen')->store('imagenes/productos', 'public');
    }

    $producto->precio_compra = $request->precio_compra;
    $producto->precio_venta  = $request->precio_venta;
    $producto->stock_minimo  = $request->stock_minimo;
    $producto->stock_maximo  = $request->stock_maximo;
    $producto->unidad_medida = $request->unidad_medida;
    $producto->estado        = $request->estado;

    $producto->save();

    // Redirigir con mensaje de éxito
    return redirect()
        ->route('productos.index')
        ->with('mensaje', 'Producto creado exitosamente')
        ->with('icono', 'success');
}


    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}