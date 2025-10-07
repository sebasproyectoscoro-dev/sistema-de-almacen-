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
        Schema::create('asignacion_equipos', function (Blueprint $table) {
        $table->id();
       $table->foreignId('id_conjunto')->nullable()->constrained('conjunto_equipos')->nullOnDelete();
    $table->foreignId('id_equipo')->nullable()->constrained('productos')->nullOnDelete();
    $table->foreignId('id_ambiente')->constrained('ambientes');
    $table->foreignId('id_responsable')->nullable()->constrained('personas');
    $table->foreignId('id_encargado')->nullable()->constrained('personas');

        $table->date('fecha_asignacion');
        $table->text('observaciones')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_equipos');
    }
};
