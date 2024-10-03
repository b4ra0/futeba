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
        Schema::create('edicoes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_temporada');
            $table->integer('id_campeonato');
            $table->integer('id_campeao')->nullable();
            $table->timestamps();

            $table->foreign('id_temporada')->references('id')->on('temporadas');
            $table->foreign('id_campeonato')->references('id')->on('campeonatos');
            $table->foreign('id_campeao')->references('id')->on('times');
        });

        Schema::create('edicao_clube', function (Blueprint $table) {
            $table->id();
            $table->integer('id_time');
            $table->integer('id_edicao');

            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_edicao')->references('id')->on('edicoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edicao_clube');
        Schema::dropIfExists('edicoes');
    }
};
