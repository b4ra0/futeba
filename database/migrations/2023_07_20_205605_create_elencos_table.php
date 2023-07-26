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
        Schema::create('elencos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_time');
            $table->integer('id_temporada');
            $table->timestamps();

            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_temporada')->references('id')->on('temporadas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elencos');
    }
};
