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
        Schema::create('folletos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('urlImagen')->nullable();
            $table->string('urlImagenThumb')->nullable();
            $table->date('fecha')->nullable();
            $table->unsignedInteger('estado')->default(1);
            $table->unsignedInteger('autorId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folletos');
    }
};
