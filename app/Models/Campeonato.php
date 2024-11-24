<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campeonato extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome'
    ];


    public function paises(): BelongsToMany
    {
        return $this->belongsToMany(Pais::class, 'pais_campeonato', 'id_campeonato', 'id_pais',);
    }

    public function edicoes()
    {
        return $this->hasMany(Edicao::class, 'id_campeonato', 'id');
    }
}
