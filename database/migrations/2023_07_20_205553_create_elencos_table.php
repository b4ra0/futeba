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
            $table->integer('time_id');
            $table->integer('temporada_id');
            $table->integer('jogador_id');
            $table->timestamps();

            $table->foreign('time_id')->references('id')->on('times');
            $table->foreign('temporada_id')->references('id')->on('temporadas');
            $table->foreign('jogador_id')->references('id')->on('jogadores');
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
