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
        Schema::create('capsulas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('fecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('tipo')->nullable();
            $table->text('url');
            $table->string('urlImagen')->nullable();
            $table->unsignedInteger('estado')->default(1);
            $table->unsignedInteger('autorId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsulas');
    }
};
