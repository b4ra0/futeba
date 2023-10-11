<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['nome', 'url_brasao'];

    use HasFactory;
    public function jogadores () {
        return $this->hasMany(Elenco::class);
    }
    public function partidas () {
        return $this->hasMany(Partida::class);
    }

    public function tecnicos () {
        return $this->hasMany(Tecnico::class);
    }

    public function campeonatos () {
        return $this->belongsToMany(Campeonato::class, 'time_campeonato_temporada', 'id_time', 'id_campeonato');
    }
}
