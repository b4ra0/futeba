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

    public function ligas () {
        return $this->belongsToMany(Liga::class, 'ligas_times', 'time_id', 'liga_id');
    }
}
