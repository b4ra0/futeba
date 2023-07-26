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
            $table->integer('id_pais');
            $table->timestamps();

            $table->foreign('id_pais')->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ligas', function (Blueprint $table) {
            $table->dropForeign(['id_pais']);
        });

        Schema::dropIfExists('ligas');
    }
};
