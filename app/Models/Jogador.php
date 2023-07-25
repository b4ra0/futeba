<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'posicao',
    ];

    public function times()
    {
        return $this->hasMany(Time::class, 'elencos');
    }
}
