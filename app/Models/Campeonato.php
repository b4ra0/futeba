<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];


    public function paises(): BelongsToMany
    {
        return $this->belongsToMany(Pais::class, 'pais_campeonato', 'id_campeonato', 'id_pais',);
    }
}
