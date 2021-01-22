<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\{Series, Temporada, Episodio};

class RemovedorSerie
{
    public function removeSerie(int $id): string
    {
        $nomeSerie = "";
        DB::transaction(function () use ($id, &$nomeSerie) {

           
            $serie = Series::find($id);
            
            $nomeSerie = $serie->nome;
           
            $this->removeTemporadas($serie);
            
            $serie->delete();
           
                
        });
        

        return $nomeSerie;
    }
    private function removeTemporadas(Series $serie)
    {
        $serie->temporadas->each( function (Temporada $temporada) {
            $this->removeEpisodios($temporada);
            $temporada->delete();
        });        
        
    }
    private function removeEpisodios(Temporada $temporada)
    {
        $temporada->episodios->each( function (Episodio $episodio) {
            $episodio->delete();
        });
       
    }
}