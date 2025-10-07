<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConjuntoEquipo extends Model
{
    use HasFactory;

    protected $table = 'conjunto_equipos';

    protected $fillable = [
        'nombre_conjunto',
        'descripcion',
        'fecha_creacion',
    ];

    // Relación con asignaciones
    public function asignaciones()
    {
        return $this->hasMany(AsignacionEquipo::class, 'id_conjunto', 'id');
    }
}
