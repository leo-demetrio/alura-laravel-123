<?php

namespace App\Http\Controllers;

use App\{Series, Temporada};
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $id)
    {
        $serie = Series::find($id);
        $serieTemp = $serie->temporadas;
       
       //        $epi = [];
       //  foreach ($serieTemp as $value) {      
       //     array_push($epi, $value->id);                    
       //  }
       //  $epidodios = "";
       //  for ($i=0; $i < count($epi) ; $i+1) { 
       //      $episodios = Temporada::find($epi[$i]);
       //  }
       // var_dump($episodios); 
       //  exit;
       //  echo $serieTemp;
       //  echo "<pre>";
       //  print_r($serieTemp);exit;
        //print_r($temporadas);exit;

        // $temporadas = $serieTemp->temporadas;

        // $episodios = "";
        // $temporadas->each(function ($temporada) use (&$episodios) {
        // 	$episodios = $temporada->episodios;
        // });

        // for ($i = 1; $i <= count($serieTemp) ; $i + 1) { 
        // 	$epidodios = $serieTemp->episodios;
        // }

        return view('temporadas.index', compact('serieTemp','serie'));
    }
}
