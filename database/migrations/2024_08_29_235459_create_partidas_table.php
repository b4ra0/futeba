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
            $table->integer('id_time_mandante');
            $table->integer('id_time_visitante');
            $table->integer('id_estadio');
            $table->integer('id_arbitro');
            $table->integer('id_fase');
            $table->integer('gols_mandante');
            $table->integer('gols_visitante');
            $table->date('data');
            $table->timestamps();

            $table->foreign('id_time_mandante')->references('id')->on('times');
            $table->foreign('id_time_visitante')->references('id')->on('times');
            $table->foreign('id_estadio')->references('id')->on('estadios');
            $table->foreign('id_arbitro')->references('id')->on('arbitros');
            $table->foreign('id_fase')->references('id')->on('fases');
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
