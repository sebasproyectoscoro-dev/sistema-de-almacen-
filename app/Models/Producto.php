<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;
     protected $table = 'productos';           

    protected $fillable = [
        'idcategoria',
        'nombre',
        'codigo',
        'descripcion',
        'imagen',
        'precio_compra',
        'precio_venta',
        'stock_minimo',
        'stock_maximo',
        'unidad_medida',
        'estado',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    } 
}