<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'sigla',
        'secao_pai',
        'om_id'
    ];

    protected $appends = ['pai','om'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'secao_user', 'secao_id', 'user_id');

    }

    public function om()
    {
        return $this->belongsTo( Om::class);

    }

    public function funcoes()
    {
        return $this->hasMany( Funcao::class);

    }

    public function getOmAttribute()
    {
        return

            Om::find($this->om_id);

    }

    public function getPaiAttribute()
    {

        if ($this->id !== $this->secao_pai && $this->secao_pai !== null) {
            $secao = Secao::find($this->secao_pai);
            $object = (object) [
                'id' => $secao->id,
                'nome' => $secao->nome,
                'sigla' => $secao->sigla
            ];

        } else {

            $object = (object) [
                'id' => $this->id,
                'nome' => $this->nome,
                'sigla' => 'Essa é uma seção pai'
            ];

        }

        return $object;


    }

}

