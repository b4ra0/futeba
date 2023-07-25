<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbitro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'id_partida'
    ];

    public function partidas ()
    {
        return $this->hasMany(Partida::class);
    }
}
