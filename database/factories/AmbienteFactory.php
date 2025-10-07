<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ambiente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ambiente>
 */
class AmbienteFactory extends Factory
{
    protected $model = Ambiente::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(6),
            'piso' => $this->faker->numberBetween(1, 5),
            'pabellon' => 'Pabellón ' . $this->faker->randomLetter(),
            'tipo_ambiente' => $this->faker->randomElement(['oficina', 'laboratorio', 'almacén', 'taller']),
        ];
    }
}
