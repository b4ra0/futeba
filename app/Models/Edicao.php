<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edicao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'edicoes';

    public function campeao(): HasOne
    {
        return $this->hasOne(Time::class, 'id', 'id_campeao');
    }
}
