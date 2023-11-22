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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('NIF');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->integer('Telefono');
            $table->string('Descripcion');
            $table->string('email');
            $table->string('Poblacion');
            $table->integer('cod_Postal');
            $table->string('Provincia');
            $table->string('Estado');
            $table->date('Creacion_tarea');
            $table->string('Operario');
            $table->date('fecha_realizacion');
            $table->string('Anotaciones_posteriores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');

    }
};
