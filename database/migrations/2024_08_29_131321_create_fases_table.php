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
        Schema::create('fases', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ['mata-mata', 'pontos_corridos', 'grupos']);
            $table->integer('id_campeonato');
            $table->integer('id_edicao');
            $table->timestamps();

            $table->foreign('id_campeonato')->references('id')->on('campeonatos');
            $table->foreign('id_edicao')->references('id')->on('edicoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fases');
    }
};
