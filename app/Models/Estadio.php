<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estadio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'apelido',
        'id_pais',
    ];
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais');
    }

    public function clubes()
    {
        return $this->belongsToMany(Clube::class, 'estadio_clube', 'id_estadio', 'id_clube');
    }
}
