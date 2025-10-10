<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
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
    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id)    ;
        return view('admin.productos.show', compact('producto'));   

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
       

          $request->validate([
        'idcategoria' => 'required|exists:categorias,id',
        'codigo'       => 'required|unique:productos,codigo,' . $id,  // se usa para q obie el prodcuto con el id dado, porque sino no lo deja actualizar xq entorara ese idf
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
    $producto = Producto::findOrFail($id);
    $producto->idcategoria  = $request->idcategoria;
    $producto->codigo        = $request->codigo;
    $producto->nombre        = $request->nombre;
    $producto->descripcion   = $request->descripcion;

    // Guardar imagen en storage/app/public/imagenes/productos
    if ($request->hasFile('imagen')) {

        Storage::disk('public')->delete($producto->imagen); // Eliminar la imagen anterior si existe
        $producto->imagen = $request->file('imagen')->store('imagenes/productos', 'public');
    }

    $producto->precio_compra = $request->precio_compra;
    $producto->precio_venta  = $request->precio_venta;
    $producto->stock_minimo  = $request->stock_minimo;
    $producto->stock_maximo  = $request->stock_maximo;
    $producto->unidad_medida = $request->unidad_medida;
    $producto->estado        = $request->estado;

    $producto->save();
    return redirect()
        ->route('productos.index')
        ->with('mensaje', 'Producto actualizado exitosamente')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $producto = Producto::findOrFail($id);

    if ($request->accion === 'cambiar_estado') {

          $producto->estado = $producto->estado == 1 ? 0 : 1;
          $producto->save();
        

        return redirect()->route('productos.index')
            ->with('mensaje', 'Se cambio de estado exitosamente.')
            ->with('icono', 'info');
    }

    // Acción por defecto: eliminar
    
    $producto->delete();

    return redirect()->route('productos.index')
        ->with('mensaje', 'Categoría eliminada exitosamente.')
        ->with('icono', 'success');

    }


      public function buscar(Request $request)
{
    $term = $request->get('term');

    $productos = Producto::where('codigo', 'LIKE', "%{$term}%")
        ->orWhere('nombre', 'LIKE', "%{$term}%")
        ->take(10)
        ->get(['id', 'codigo', 'nombre', 'descripcion', 'precio_compra', 'precio_venta']);

    $data = [];

    foreach ($productos as $producto) {
        $data[] = [
            'label' => $producto->codigo . ' — ' . $producto->nombre,
            'value' => $producto->codigo,
            'data' => [
                'codigo' => $producto->codigo,
                'nombre' => $producto->nombre,
                'marca' => 'Sin marca', // ← valor simulado
                'serie' => 'S/N',       // ← valor simulado
                'descripcion' => $producto->descripcion,
            ]
        ];
    }

    return response()->json($data);
}

}