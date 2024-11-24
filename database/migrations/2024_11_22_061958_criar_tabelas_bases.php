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
            $table->string('brasao_path');
        });

        // Tabela Campeonatos
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string('sigla', 3);
            $table->string('logo_path');
        });

        // Tabela rl_pais_campeonato
        Schema::create('pais_campeonato', function (Blueprint $table) {
            $table->id();
        });

        // Tabela edições
        Schema::create('edicoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->year('temporada');
            $table->string('logo_path');
        });

        // Tabela fases
        Schema::create('fases', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ["mata-mata", "pontos_corridos", "grupos"]);
            $table->boolean("decisiva");
            $table->boolean("eliminatoria");
            $table->boolean("ida_e_volta");
        });

        // Tabela rl_edição_clube
        Schema::create('edicao_clube', function (Blueprint $table) {
            $table->id();
        });

        // Tabela clubes
        Schema::create('clubes', function (Blueprint $table) {
            $table->id();
            $table->string("nome_completo");
            $table->string('nome_popular');
            $table->date('fundacao');
            $table->string('logo_path');
        });

        // Tabela rl_estadio_clube
        Schema::create('estadio_clube', function (Blueprint $table) {
            $table->id();
        });

        // Tabela estádios
        Schema::create('estadios', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("apelido");
        });

        // Tabela partidas
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->integer('placar_mandante');
            $table->integer('placar_visitante');
            $table->timestamp('horario');
        });

        // Tabela rl_jogador_partida
        Schema::create('jogador_partida', function (Blueprint $table) {
            $table->id();
            $table->integer('camisa');
        });

        // Tabela jogadores
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->date('data_de_nascimento');
            $table->string('foto_path');
        });

        // Tabela rl_clube_jogador
        Schema::create('clube_jogador', function (Blueprint $table) {
            $table->id();
        });

        // Tabela gols
        Schema::create('gols', function (Blueprint $table) {
            $table->id();
            $table->integer('minuto');
            $table->enum('tipo', ['cabeca', 'penalti', 'falta', 'chute', 'olimpico', 'contra']);
        });

        // Tabela transferencias
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('id_clube_saida')->nullable();
            $table->unsignedBigInteger('id_clube_chegada')->nullable();
            $table->enum('tipo', ['transferencia', 'emprestimo', 'livre']);
            $table->float('valor');
        });

        // Tabela arbitros
        Schema::create('arbitros', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
        });

        // Tabela rl_arbitro_partida
        Schema::create('arbitro_partida', function (Blueprint $table) {
            $table->id();
            $table->enum('papel', ['principal', 'assistente', 'quarto_arbitro']);
        });



        // Criando foreign keys
        Schema::table('pais_campeonato', function (Blueprint $table) {
            $table->foreignId("id_campeonato")->constrained("campeonatos");
            $table->foreignId('id_pais')->constrained('paises');
        });
        Schema::table('edicoes', function (Blueprint $table) {
            $table->foreignId("id_campeonato")->constrained("campeonatos");
            $table->foreignId("id_campeao")->constrained("clubes");
        });
        Schema::table('fases', function (Blueprint $table) {
            $table->foreignId("id_edicao")->constrained("edicoes");
        });
        Schema::table('edicao_clube', function (Blueprint $table) {
            $table->foreignId("id_edicao")->constrained("edicoes");
            $table->foreignId("id_clube")->constrained("clubes");
        });
        Schema::table('estadios', function (Blueprint $table) {
            $table->foreignId("id_pais")->constrained("paises");
        });
        Schema::table('estadio_clube', function (Blueprint $table) {
            $table->foreignId("id_estadio")->constrained("estadios");
            $table->foreignId("id_clube")->constrained("clubes");
        });
        Schema::table('partidas', function (Blueprint $table) {
            $table->foreignId('id_mandante')->constrained('clubes');
            $table->foreignId('id_visitante')->constrained('clubes');
            $table->foreignId('id_estadio')->constrained('estadios');
            $table->foreignId('id_fase')->constrained('fases');
        });
        Schema::table('jogador_partida', function (Blueprint $table) {
            $table->foreignId('id_partida')->constrained('partidas');
            $table->foreignId('id_jogador')->constrained('jogadores');
            $table->foreignId('id_clube')->constrained('clubes');
        });
        Schema::table('jogadores', function (Blueprint $table) {
            $table->foreignId('id_pais')->constrained('paises');
        });
        Schema::table('clube_jogador', function (Blueprint $table) {
            $table->foreignId('id_clube')->constrained('clubes');
            $table->foreignId('id_jogador')->constrained('jogadores');
        });
        Schema::table('gols', function (Blueprint $table) {
            $table->foreignId('id_partida')->constrained('partidas');
            $table->foreignId('id_jogador')->constrained('jogadores');
        });
        Schema::table('transferencias', function (Blueprint $table) {
            $table->foreignId('id_clube_saida')->nullable()->constrained('clubes');
            $table->foreignId('id_clube_chegada')->nullable()->constrained('clubes');
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
