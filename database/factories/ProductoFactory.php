<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idcategoria' => $this->faker->numberBetween(1, 10),
            'codigo' => $this->faker->unique()->numerify('#####'),
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'imagen' => $this->faker->imageUrl(),
           'precio_venta' => $this->faker->randomFloat(2, 1, 100),
             'precio_compra' => $this->faker->randomFloat(2, 1, 80),
             'stock_minimo' => $this->faker->numberBetween(1, 10),
             'stock_maximo' => $this->faker->numberBetween(11, 100),
             'unidad_medida' => $this->faker->randomElement(['kg', 'litro', 'unidad']),
             'estado' => $this->faker->randomElement([1, 0]) // 80% de probabilidad de ser true
                                                                                          
        ];
    }
}