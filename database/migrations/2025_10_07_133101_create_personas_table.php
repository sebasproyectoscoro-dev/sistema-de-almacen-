<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
              $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100)->nullable();
            $table->enum('tipo_persona', ['responsable', 'encargado', 'tecnico', 'usuario'])->default('usuario');
            $table->string('cargo', 100)->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
