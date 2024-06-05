<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Endereco extends Model
{
    use SoftDeletes;

    protected $fillable = ['rua','numero','complemento','bairro','cidade','estado','cep','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}

