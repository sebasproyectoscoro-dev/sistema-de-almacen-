<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Ambiente;
use App\Models\ConjuntoEquipo;
use App\Models\Persona;
use App\Models\AsignacionEquipo;
use App\Models\HojaVida;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuarios
        User::factory(10)->create();

        // Categorías y Productos
        Categoria::factory(5)->create()->each(function($categoria) {
            Producto::factory(4)->create(['idcategoria' => $categoria->id]);
        });

        // Ambientes
        Ambiente::factory(5)->create();

        // Conjuntos de Equipos
        ConjuntoEquipo::factory(5)->create();

        // Personas
        Persona::factory(10)->create();

        // Asignaciones de Equipos
        AsignacionEquipo::factory(10)->create();

        // Hojas de Vida
       // HojaVida::factory(10)->create();
    }
}
