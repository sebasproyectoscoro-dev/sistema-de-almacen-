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
        Schema::create('conjunto_equipos', function (Blueprint $table) {
    $table->id(); // crea columna 'id' como PRIMARY KEY
    $table->string('nombre_conjunto', 100);
    $table->text('descripcion')->nullable();
    $table->date('fecha_creacion')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conjunto_equipos');
    }
};
