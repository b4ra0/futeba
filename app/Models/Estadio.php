<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade',
        'id_time',
        'id_pais',
        'capacidade'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
