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
        Schema::create('compendios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('urlDocumento')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('criterio')->nullable();
            $table->date('fecha')->nullable();
            $table->unsignedInteger('autorId')->nullable();
            $table->unsignedInteger('estado')->default(1);
            $table->timestamps();
            $table->string('urlImagenThumb')->nullable();

            $table->string('area');
            $table->string('identificacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compendios');
    }
};
