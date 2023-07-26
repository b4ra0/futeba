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
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('posição');
            $table->timestamps();
        });

        Schema::create('jogadores_elencos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jogador');
            $table->integer('id_elenco');
            $table->timestamps();

            $table->foreign('id_jogador')->references('id')->on('jogadores');
            $table->foreign('id_elenco')->references('id')->on('elencos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jogadores_elencos', function (Blueprint $table) {
            $table->dropForeign(['id_jogador']);
            $table->dropForeign(['id_elenco']);
        });

        Schema::dropIfExists('jogadores');
        Schema::dropIfExists('jogadores_elencos');
    }
};
