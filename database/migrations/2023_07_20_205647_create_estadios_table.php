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
        Schema::create('estadios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cidade');
            $table->integer('id_pais');
            $table->integer('capacidade');
            $table->timestamps();

            $table->foreign('id_pais')->references('id')->on('paises');
        });

        Schema::create('estadio_time', function (Blueprint $table) {
            $table->id();
            $table->integer('id_time');
            $table->integer('id_estadio');

            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_estadio')->references('id')->on('estadios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estadios', function (Blueprint $table){
            $table->dropConstrainedForeignId('id_pais');
        });
        Schema::table('estadio_time', function (Blueprint $table){
            $table->dropConstrainedForeignId('id_time');
            $table->dropConstrainedForeignId('id_estadio');
        });
        Schema::dropIfExists('estadio_time');
        Schema::dropIfExists('estadios');
    }
};
