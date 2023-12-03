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
            $table->string('criterio');
            $table->year('anio');
            $table->string('autor');
            $table->string('area');
            $table->string('identificacion');
            $table->string('sintesis');
            $table->string('urlPDF')->nullable();
            $table->timestamps();
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
