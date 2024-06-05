<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class VideoConferencia extends Model
{
    use SoftDeletes;

    protected $table = 'videoconferencias';

    protected $fillable = [
        'missao',
        'data',
        'hora',
        'data_teste',
        'hora_teste',
        'solicitante',
        'link',
        'plataforma',
        'local',
        'obs',
        'status',
        'responsavel_id',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class);
    }

}

