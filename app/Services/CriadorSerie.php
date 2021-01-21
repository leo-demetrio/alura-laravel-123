<?php

namespace App\Services;

use App\Series;

class CriadorSerie
{

    public function criarSerie($req): Series
    {
        //echo $req->nome;exit;
       $serie = Series::create(['nome' => $req->nome]);
       $qtdTemporadas = $req->qtd_temporadas;
       for($i = 1; $i <= $qtdTemporadas; $i++) {
           $temporada = $serie->temporadas()->create(['numero' => $i]);

           for($j = 1; $j <= $req->ep_por_temporada; $j++) {
               $episodio = $temporada->episodios()->create(['numero' => $j]);
           }
       }
       return $serie;

    }
    
}