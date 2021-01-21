<?php

namespace App\Http\Controllers;

use App\Series;
use App\Temporada;
use Illuminate\Http\Request;
use App\Services\CriadorSerie;
use App\Services\RemovedorSerie;
use App\Http\Requests\SeriesFormRequest;


class SeriesController 
{
    public function index(Request $req)
    {
        $series = Series::query()->orderby('nome')->get();
        $mnes  = $req->session()->get('mnes');
        //$series = Series::all();      
        //$titulo = 'Listar séries';

        return view('series.index', [
            //'titulo' => $titulo,
            'series' => $series ,
            'mnes' => $mnes 
        ]
        );
    }
    public function create()
    {
        $titulo = 'Criar séries';

        return view('series.create', compact('titulo'));
    }
    public function destroy(Request $req, RemovedorSerie $removedor)
    {
        
       $seireRemovida = $removedor->removeSerie($req->id);
        $req->session()->flash('mnes',"Série removida $seireRemovida com sucesso!!");
        return redirect()->route('listar_series'); 
    }
    public function store(
        SeriesFormRequest $req,
        CriadorSerie $criador)
    {     
        
       $serie = $criador->criarSerie($req);
       $req->session()->flash('mnes',"Série {$serie->nome} ({$serie->id}) criada com sucesso!!");
       return redirect()->route('listar_series'); 

        // $nome = $req->nome;
        // $serie = Series::create([
        //     'nome' => $nome
        // ]);

        //echo "Serie {$serie->nome} criada";

        
        
        //$serie = new Series();
        //$serie->nome = $nome;
        // var_dump($serie->save());
       
    }
}