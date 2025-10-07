<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AsignacionEquipo;
use App\Models\ConjuntoEquipo;
use App\Models\Producto;
use App\Models\Ambiente;
use App\Models\Persona;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AsignacionEquipo>
 */
class AsignacionEquipoFactory extends Factory
{
    protected $model = AsignacionEquipo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_conjunto' => ConjuntoEquipo::factory(),
            'id_equipo' => Producto::factory(),
            'id_ambiente' => Ambiente::factory(),
            'id_responsable' => Persona::factory(),
            'id_encargado' => Persona::factory(),
            'fecha_asignacion' => $this->faker->date('Y-m-d'),
            'observaciones' => $this->faker->sentence(6),
        ];
    }
}
