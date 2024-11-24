<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jogador extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jogadores';

    protected $fillable = [
        'nome',
        'posicao',
    ];

    public function times()
    {
        return $this->hasMany(Time::class, 'elencos');
    }
}
