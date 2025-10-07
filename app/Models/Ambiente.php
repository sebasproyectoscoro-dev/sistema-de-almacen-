<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $table = 'ambientes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'piso',
        'pabellon',
        'tipo_ambiente',
    ];

    // Relación: un ambiente puede tener muchas asignaciones
    public function asignaciones()
    {
        return $this->hasMany(AsignacionEquipo::class, 'id_ambiente', 'id');
    }

    // Relación: un ambiente puede tener muchas hojas de vida
    public function hojasVida()
    {
        return $this->hasMany(HojaVida::class, 'id_ambiente', 'id');
    }
}
