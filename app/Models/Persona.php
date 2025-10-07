<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombres',
        'apellidos',
        'tipo_persona',
        'cargo',
        'correo',
        'telefono',
    ];

    // Relación con asignaciones como responsable
    public function asignacionesResponsable()
    {
        return $this->hasMany(AsignacionEquipo::class, 'id_responsable', 'id');
    }

    // Relación con asignaciones como encargado
    public function asignacionesEncargado()
    {
        return $this->hasMany(AsignacionEquipo::class, 'id_encargado', 'id');
    }
}
