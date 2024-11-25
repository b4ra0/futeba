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
        // Tabela Países
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string('sigla', 3);
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela Campeonatos
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string('sigla', 3);
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela rl_pais_campeonato
        Schema::create('pais_campeonato', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_campeonato');
            $table->unsignedBigInteger('id_pais');
        });

        // Tabela edições
        Schema::create('edicoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->year('temporada');
            $table->string('logo_path');
            $table->unsignedBigInteger('id_campeonato');
            $table->unsignedBigInteger('id_campeao');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela fases
        Schema::create('fases', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ["mata-mata", "pontos_corridos", "grupos"]);
            $table->boolean("decisiva");
            $table->boolean("eliminatoria");
            $table->boolean("ida_e_volta");
            $table->unsignedBigInteger('id_edicao');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela rl_edição_clube
        Schema::create('edicao_clube', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_edicao');
            $table->unsignedBigInteger('id_clube');
        });

        // Tabela clubes
        Schema::create('clubes', function (Blueprint $table) {
            $table->id();
            $table->string("nome_completo");
            $table->string('nome_popular');
            $table->date('fundacao');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela rl_estadio_clube
        Schema::create('estadio_clube', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estadio');
            $table->unsignedBigInteger('id_clube');
            $table->boolean('proprietario');
        });

        // Tabela estádios
        Schema::create('estadios', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("apelido");
            $table->unsignedBigInteger('id_pais');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela partidas
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->integer('placar_mandante');
            $table->integer('placar_visitante');
            $table->timestamp('horario');
            $table->unsignedBigInteger('id_mandante');
            $table->unsignedBigInteger('id_visitante');
            $table->unsignedBigInteger('id_estadio');
            $table->unsignedBigInteger('id_fase');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela rl_jogador_partida
        Schema::create('jogador_partida', function (Blueprint $table) {
            $table->id();
            $table->integer('camisa');
            $table->unsignedBigInteger('id_partida');
            $table->unsignedBigInteger('id_jogador');
            $table->unsignedBigInteger('id_clube');
        });

        // Tabela jogadores
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->date('data_de_nascimento');
            $table->enum('posicao', ['goleiro', 'zagueiro', 'lateral', 'volante', 'meia', 'atacante']);
            $table->unsignedBigInteger('id_pais');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela rl_clube_jogador
        Schema::create('clube_jogador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_clube');
            $table->unsignedBigInteger('id_jogador');
        });

        // Tabela gols
        Schema::create('gols', function (Blueprint $table) {
            $table->id();
            $table->integer('minuto');
            $table->enum('tipo', ['cabeca', 'penalti', 'falta', 'chute', 'olimpico', 'contra']);
            $table->unsignedBigInteger('id_partida');
            $table->unsignedBigInteger('id_jogador');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela transferencias
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('id_clube_saida')->nullable();
            $table->unsignedBigInteger('id_clube_chegada')->nullable();
            $table->enum('tipo', ['transferencia', 'emprestimo', 'livre']);
            $table->float('valor');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela arbitros
        Schema::create('arbitros', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabela rl_arbitro_partida
        Schema::create('arbitro_partida', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_arbitro');
            $table->unsignedBigInteger('id_partida');
            $table->enum('papel', ['principal', 'assistente', 'quarto_arbitro']);
        });



        // Criando foreign keys
        Schema::table('pais_campeonato', function (Blueprint $table) {
            $table->foreign("id_campeonato")->references('id')->on("campeonatos");
            $table->foreign('id_pais')->references('id')->on('paises');
        });
        Schema::table('edicoes', function (Blueprint $table) {
            $table->foreign("id_campeonato")->references('id')->on("campeonatos");
            $table->foreign("id_campeao")->references('id')->on("clubes");
        });
        Schema::table('fases', function (Blueprint $table) {
            $table->foreign("id_edicao")->references('id')->on("edicoes");
        });
        Schema::table('edicao_clube', function (Blueprint $table) {
            $table->foreign("id_edicao")->references('id')->on("edicoes");
            $table->foreign("id_clube")->references('id')->on("clubes");
        });
        Schema::table('estadios', function (Blueprint $table) {
            $table->foreign("id_pais")->references('id')->on("paises");
        });
        Schema::table('estadio_clube', function (Blueprint $table) {
            $table->foreign("id_estadio")->references('id')->on("estadios");
            $table->foreign("id_clube")->references('id')->on("clubes");
        });
        Schema::table('partidas', function (Blueprint $table) {
            $table->foreign('id_mandante')->references('id')->on('clubes');
            $table->foreign('id_visitante')->references('id')->on('clubes');
            $table->foreign('id_estadio')->references('id')->on('estadios');
            $table->foreign('id_fase')->references('id')->on('fases');
        });
        Schema::table('jogador_partida', function (Blueprint $table) {
            $table->foreign('id_partida')->references('id')->on('partidas');
            $table->foreign('id_jogador')->references('id')->on('jogadores');
            $table->foreign('id_clube')->references('id')->on('clubes');
        });
        Schema::table('jogadores', function (Blueprint $table) {
            $table->foreign('id_pais')->references('id')->on('paises');
        });
        Schema::table('clube_jogador', function (Blueprint $table) {
            $table->foreign('id_clube')->references('id')->on('clubes');
            $table->foreign('id_jogador')->references('id')->on('jogadores');
        });
        Schema::table('gols', function (Blueprint $table) {
            $table->foreign('id_partida')->references('id')->on('partidas');
            $table->foreign('id_jogador')->references('id')->on('jogadores');
        });
        Schema::table('transferencias', function (Blueprint $table) {
            $table->foreign('id_clube_saida')->references('id')->on('clubes');
            $table->foreign('id_clube_chegada')->references('id')->on('clubes');
        });
        Schema::table('arbitro_partida', function (Blueprint $table) {
            $table->foreign('id_arbitro')->references('id')->on('arbitros');
            $table->foreign('id_partida')->references('id')->on('partidas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Criando foreign keys
        Schema::table('pais_campeonato', function (Blueprint $table) {
            $table->dropConstrainedForeignId("id_campeonato");
            $table->dropConstrainedForeignId('id_pais');
        });
        Schema::table('edicoes', function (Blueprint $table) {
            $table->dropConstrainedForeignId("id_campeonato");
            $table->dropConstrainedForeignId("id_campeao");
        });
        Schema::table('fases', function (Blueprint $table) {
            $table->dropConstrainedForeignId("id_edicao");
        });
        Schema::table('edicao_clube', function (Blueprint $table) {
            $table->dropConstrainedForeignId("id_edicao");
            $table->dropConstrainedForeignId("id_clube");
        });
        Schema::table('estadios', function (Blueprint $table) {
            $table->dropConstrainedForeignId("id_pais");
        });
        Schema::table('estadio_clube', function (Blueprint $table) {
            $table->dropConstrainedForeignId("id_estadio");
            $table->dropConstrainedForeignId("id_clube");
        });
        Schema::table('partidas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_mandante');
            $table->dropConstrainedForeignId('id_visitante');
            $table->dropConstrainedForeignId('id_estadio');
            $table->dropConstrainedForeignId('id_fase');
        });
        Schema::table('jogador_partida', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_partida');
            $table->dropConstrainedForeignId('id_jogador');
            $table->dropConstrainedForeignId('id_clube');
        });
        Schema::table('jogadores', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_pais');
        });
        Schema::table('clube_jogador', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_clube');
            $table->dropConstrainedForeignId('id_jogador');
        });
        Schema::table('gols', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_partida');
            $table->dropConstrainedForeignId('id_jogador');
        });
        Schema::table('transferencias', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_clube_saida');
            $table->dropConstrainedForeignId('id_clube_chegada');
        });
        Schema::table('arbitro_partida', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_arbitro');
            $table->dropConstrainedForeignId('id_partida');
        });


        // Drop
        Schema::dropIfExists('paises');
        Schema::dropIfExists('campeonatos');
        Schema::dropIfExists('pais_campeonato');
        Schema::dropIfExists('edicoes');
        Schema::dropIfExists('fases');
        Schema::dropIfExists('edicao_clube');
        Schema::dropIfExists('clubes');
        Schema::dropIfExists('estadio_clube');
        Schema::dropIfExists('estadios');
        Schema::dropIfExists('partidas');
        Schema::dropIfExists('jogador_partida');
        Schema::dropIfExists('jogadores');
        Schema::dropIfExists('clube_jogador');
        Schema::dropIfExists('gols');
        Schema::dropIfExists('transferencias');
        Schema::dropIfExists('arbitros');
        Schema::dropIfExists('arbitro_partida');
    }
};
