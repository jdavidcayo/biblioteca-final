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
        Schema::table('compendios', function (Blueprint $table) {
            // Cambiar el tipo de campo de string a unsignedInteger
            $table->unsignedInteger('criterio')->nullable()->change();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compendios', function (Blueprint $table) {
            // Revertir el cambio si es necesario
            $table->string('criterio')->nullable()->change();
        });
    }
};
