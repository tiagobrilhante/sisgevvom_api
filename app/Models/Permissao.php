<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{

    protected $fillable =['funcao_id','permissao'];

    public function funcao()
    {
        return $this->belongsTo( Funcao::class);

    }

}
