<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Time extends Model
{
    protected $fillable = ['nome', 'url_brasao', 'fundacao'];

    use HasFactory;
//    public function jogadores () {
//        return $this->hasMany(Elenco::class);
//    }

    public function jogos_visitante () {
        return $this->hasMany(Partida::class, 'time_visitante_id');
    }

    public function jogos_mandante () {
        return $this->hasMany(Partida::class, 'time_mandante_id');
    }

    public function estadios(): BelongsToMany
    {
        return $this->belongsToMany(Estadio::class, 'estadio_time', 'id_time', 'id_estadio');
    }

//    public function tecnicos () {
//        return $this->hasMany(Tecnico::class);
//    }

//    public function campeonatos () {
//        return $this->belongsToMany(Campeonato::class, 'time_campeonato_temporada', 'id_time', 'id_campeonato');
//    }
}
