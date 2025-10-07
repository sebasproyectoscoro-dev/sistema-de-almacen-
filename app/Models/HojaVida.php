<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaVida extends Model
{
    use HasFactory;

    protected $table = 'hoja_vidas';
    protected $primaryKey = 'id_hoja_vida';

    protected $fillable = [
        'id_conjunto',
        'id_equipo',
        'id_ambiente',
        'id_tecnico',
        'fecha',
        'tipo_mantenimiento',
        'descripcion',
        'observaciones',
        'estado_post_mantenimiento',
        'proximo_mantenimiento',
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

    public function tecnico()
    {
        return $this->belongsTo(Persona::class, 'id_tecnico', 'id');
    }
}
