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
      Schema::create('hoja_vidas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('id_conjunto')->nullable()->constrained('conjunto_equipos')->nullOnDelete();
    $table->foreignId('id_equipo')->nullable()->constrained('productos')->nullOnDelete();
    $table->foreignId('id_ambiente')->constrained('ambientes');
    $table->foreignId('id_tecnico')->constrained('personas');
    $table->date('fecha');
    $table->enum('tipo_mantenimiento', ['preventivo','correctivo','instalación','retiro','traslado','actualización']);
    $table->text('descripcion')->nullable();
    $table->text('observaciones')->nullable();
    $table->enum('estado_post_mantenimiento', ['operativo','en reparación','dado de baja'])->default('operativo');
    $table->date('proximo_mantenimiento')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoja_vidas');
    }
};
