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
            $table->string('criterio')->nullable()->foreign('criterio')->references('id')->on('criterios');;
            $table->year('anio')->nullable();
            $table->date('fecha')->nullable();
            $table->string('nombreArchivo')->nullable();
            $table->unsignedInteger('autorId')->nullable()->foreign('autorId')->references('id')->on('users');
            $table->unsignedInteger('autoridad')->nullable()->foreign('autoridad')->references('id')->on('autoridades');
            $table->unsignedInteger('estado')->default(1);
            $table->string('urlImagen')->nullable();
            $table->timestamps();

            $table->string('area')->nullable();
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
