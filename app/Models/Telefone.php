<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Telefone extends Model
{
    use SoftDeletes;

    protected $fillable = ['numero','funcional','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}

