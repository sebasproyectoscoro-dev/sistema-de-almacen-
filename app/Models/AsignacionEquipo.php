<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionEquipo extends Model
{
    use HasFactory;

    protected $table = 'asignacion_equipos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_conjunto',
        'id_equipo',
        'id_ambiente',
        'id_responsable',
        'id_encargado',
        'fecha_asignacion',
        'observaciones',
    ];

    // Relaciones

    public function conjunto()
    {
        return $this->belongsTo(ConjuntoEquipo::class, 'id_conjunto', 'id');
    }

    public function equipo()
    {
        return $this->belongsTo(Producto::class, 'id_equipo', 'id');
    }

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class, 'id_ambiente', 'id');
    }

    public function responsable()
    {
        return $this->belongsTo(Persona::class, 'id_responsable', 'id');
    }

    public function encargado()
    {
        return $this->belongsTo(Persona::class, 'id_encargado', 'id');
    }
}
