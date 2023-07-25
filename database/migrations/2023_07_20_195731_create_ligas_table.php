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
        Schema::create('ligas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('pais_id');
            $table->timestamps();

            $table->foreign('pais_id')->references('id')->on('paises');
        });

        Schema::create('times_ligas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_time');
            $table->integer('id_liga');
            $table->timestamps();

            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_liga')->references('id')->on('ligas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligas');
        Schema::dropIfExists('times_ligas');
    }
};
