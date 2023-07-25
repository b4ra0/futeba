<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_time',
        'id_temporada',
        'id_jogador'
    ];

    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id');
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'temporada_id');
    }

    public function jogador()
    {
        return $this->belongsTo(Jogador::class, 'jogador_id');
    }
}
