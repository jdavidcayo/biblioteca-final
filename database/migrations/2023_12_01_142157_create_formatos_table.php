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
        Schema::create('formatos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('urlImagenThumb')->nullable();
            $table->string('urlDocumento')->nullable();
            $table->unsignedInteger('autorId')->nullable();
            $table->unsignedInteger('estado')->default(1);
            $table->date('fecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('autoridadId')->nullable();
            $table->unsignedInteger('temaId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formatos');
    }
};
