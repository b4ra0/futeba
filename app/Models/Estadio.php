<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estadio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade',
        'id_pais',
        'capacidade'
    ];
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais');
    }

    public function time()
    {
        return $this->belongsToMany(Time::class, 'estadio_time');
    }
}
