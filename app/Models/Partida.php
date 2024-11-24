<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partida extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'temporada_id',
        'time_mandante_id',
        'time_visitante_id',
        'estadio_id',
        'arbitro_id',
        'gols_mandante',
        'gols_visitante',
    ];

    public function temporada(): HasOne
    {
        return $this->hasOne(Temporada::class);
    }

    public function time_mandante(): HasOne
    {
        return $this->hasOne(Time::class, 'id', 'time_mandante_id');
    }

    public function time_visitante(): HasOne
    {
        return $this->hasOne(Time::class, 'id', 'time_visitante_id');
    }
}
