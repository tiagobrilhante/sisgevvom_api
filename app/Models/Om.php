<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Om extends Model
{

    use SoftDeletes;

    protected $fillable =['nome','sigla','om_pai'];
    protected $perPage = 20;
    protected $appends = ['pai'];

    public function secoes()
    {
        return $this->hasMany( Secao::class);

    }

    public function getPaiAttribute()
    {

        if ($this->id !== $this->om_pai && $this->om_pai !== null) {
            $om = Om::find($this->om_pai);
            $object = (object) [
                'id' => $om->id,
                'nome' => $om->nome,
                'sigla' => $om->sigla
            ];

        } else {

            $object = (object) [
                'id' => $this->id,
                'nome' => $this->nome,
                'sigla' => 'Essa é uma Om pai'
            ];

        }

        return $object;


    }

}
