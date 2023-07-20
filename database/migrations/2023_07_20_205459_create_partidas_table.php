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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->integer('temporada_id');
            $table->integer('time_mandante_id');
            $table->integer('time_visitante_id');
            $table->integer('estadio_id');
            $table->integer('arbitro_id');
            $table->integer('gols_mandante');
            $table->integer('gols_visitante');
            $table->timestamps();

            $table->foreign('temporada_id')->references('id')->on('temporadas');
            $table->foreign('time_mandante_id')->references('id')->on('times');
            $table->foreign('time_visitante_id')->references('id')->on('times');
            $table->foreign('estadio_id')->references('id')->on('estadios');
            $table->foreign('arbitro_id')->references('id')->on('arbitros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
