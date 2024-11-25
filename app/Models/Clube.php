<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clube extends Model
{
    protected $fillable = ['nome_completo', 'nome_popular', 'fundacao'];

    use HasFactory;
    use SoftDeletes;
}
