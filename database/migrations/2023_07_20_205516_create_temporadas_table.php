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
        Schema::create('temporadas', function (Blueprint $table) {
            $table->id();
            $table->string('ano');
            $table->timestamps();
        });

        Schema::create('time_campeonato_temporada', function (Blueprint $table){
            $table->id();
            $table->integer('id_time');
            $table->integer('id_temporada');
            $table->integer('id_campeonato');
            $table->timestamps();

            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_campeonato')->references('id')->on('campeonatos');
            $table->foreign('id_temporada')->references('id')->on('temporadas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_campeonato_temporada', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_time');
            $table->dropConstrainedForeignId('id_campeonato');
            $table->dropConstrainedForeignId('id_temporada');
        });
        Schema::dropIfExists('time_campeonato_temporada');
        Schema::dropIfExists('temporadas');
    }
};
