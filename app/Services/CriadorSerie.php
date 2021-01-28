<?php

namespace App\Services;

use App\Series;
use Illuminate\Support\Facades\DB;

class CriadorSerie
{

    public function criarSerie($req): Series
    {
      
       DB::beginTransaction();
       $serie = Series::create(['nome' => $req->nome]);
       $temporadas = $this->criarTemporadas($serie,$req);
       DB::commit();

       return $serie;

    }

    private function criarTemporadas($serie,$req)
    {
    
      for($i = 1; $i <= $req->qtd_temporadas; $i++) {

           $temporada = $serie->temporadas()->create(['numero' => $i]);

           $this->criarEpisodios($temporada,$req->ep_por_temporadas);

         }
         echo "<pre>";
        
         return $temporada;
    }
    private function criarEpisodios($temporada,$ep_por_temporada)
    {
       for($j = 1; $j <= $ep_por_temporada; $j++) {

               $episodio = $temporada->episodios()->create(['numero' => $j]);

           }
       
    }
    
}