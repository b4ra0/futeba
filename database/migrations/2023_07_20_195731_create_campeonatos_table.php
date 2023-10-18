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
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('pais_campeonato', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pais');
            $table->integer('id_campeonato');

            $table->foreign('id_pais')->references('id')->on('paises');
            $table->foreign('id_campeonato')->references('id')->on('campeonatos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pais_campeonato', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_pais');
            $table->dropConstrainedForeignId('id_campeonato');
        });

        Schema::dropIfExists('pais_campeonato');
        Schema::dropIfExists('campeonatos');
    }
};
