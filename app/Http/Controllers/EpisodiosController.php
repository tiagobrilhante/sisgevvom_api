<?php

namespace App\Http\Controllers;

use App\Models\Episodio;


class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;

    }

    public function buscaPorSerie(int $serieId)
    {
        $episodios = Episodio::where('serie_id',$serieId)->paginate();

        return $episodios;
    }

}