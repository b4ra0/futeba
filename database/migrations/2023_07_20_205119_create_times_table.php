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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('url_brasao');
            $table->timestamps();
        });

        Schema::create('ligas_times', function (Blueprint $table){
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
        Schema::table('ligas_times', function (Blueprint $table) {
            $table->dropForeign(['id_time']);
            $table->dropForeign(['id_liga']);
        });

        Schema::dropIfExists('times');
        Schema::dropIfExists('ligas_times');
    }
};
