<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'secao_id',
        'user_id'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'funcao_user', 'funcao_id', 'user_id');

    }

    public function secao()
    {
        return $this->belongsTo( Secao::class);

    }

    public function permissoes()
    {
        return $this->hasMany( Permissao::class);

    }

}

