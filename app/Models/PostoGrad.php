<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PostoGrad extends Model
{
    use SoftDeletes;

    protected $fillable = ['posto_grad','hierarquia'];

    protected $table = 'postograds';


    public function users()
    {
        return $this->hasMany(User::class, 'posto_grad_id', 'id');
    }

}

