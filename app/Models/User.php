<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'password',
        'nome_completo',
        'sexo',
        'nome_guerra',
        'posto_grad_id',
        'data_nasc',
        'data_praca',
        'data_pronto_om',
        'email',
        'reset',
        'homologado',
        'om_id'
    ];

    protected $table = 'users';

    protected $appends = ['nomeMilitar'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public function postograd()
    {
        return $this->belongsTo(PostoGrad::class, 'posto_grad_id', 'id');

    }
    public function endereco()
    {
        return $this->hasOne(Endereco::class);

    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class);

    }

    public function secoes()
    {
        return $this->belongsToMany(Secao::class, 'secao_user', 'user_id', 'secao_id');

    }

    public function funcoes()
    {
        return $this->belongsToMany(Funcao::class, 'funcao_user', 'user_id', 'funcao_id');

    }

    public function getNomeMilitarAttribute()
    {
        $postoGrad = PostoGrad::find($this->posto_grad_id);

        if ($postoGrad) {
            return $postoGrad->posto_grad . "  " . $this->nome_guerra;
        } else {
            return "Não cadastrado";
        }

    }

    public function vc()
    {
        return $this->hasOne(VideoConferencia::class);
    }

    public function vcresp()
    {
        return $this->hasOne(VideoConferencia::class);
    }

}

