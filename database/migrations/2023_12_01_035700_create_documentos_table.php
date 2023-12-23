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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedInteger('temaId')->nullable();
            $table->unsignedInteger('autoridadId')->nullable();
            $table->unsignedInteger('autorId')->nullable();
            $table->unsignedInteger('estado')->nullable();
            $table->string('nombreArchivo')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('urlImagen')->nullable();
            $table->string('urlDocumento')->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
