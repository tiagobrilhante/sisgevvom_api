<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'sigla'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'secao_user', 'secao_id', 'user_id');

    }

}

