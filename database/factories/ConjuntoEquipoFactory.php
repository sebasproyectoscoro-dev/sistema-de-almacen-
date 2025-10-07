<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ConjuntoEquipo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConjuntoEquipo>
 */
class ConjuntoEquipoFactory extends Factory
{
    protected $model = ConjuntoEquipo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_conjunto' => 'Conjunto ' . $this->faker->word(),
            'descripcion' => $this->faker->sentence(6),
            'fecha_creacion' => $this->faker->date('Y-m-d'),
        ];
    }
}
