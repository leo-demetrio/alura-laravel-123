<?php

namespace App\Http\Controllers;

use App\Series;
use App\Temporada;
use Illuminate\Http\Request;
use App\Services\CriadorSerie;
use App\Services\RemovedorSerie;
use App\Http\Requests\SeriesFormRequest;
use \App\Mail\NovaSerie;
use Illuminate\Support\Facades\Mail;


class SeriesController 
{
    public function index(Request $req)
    {
        $series = Series::query()->orderby('nome')->get();
        $mnes  = $req->session()->get('mnes');
        //$series = Series::all();      
        //$titulo = 'Listar séries';

        return view('series.index', compact('series','mnes'));
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

    
    public function store(SeriesFormRequest $req,CriadorSerie $criador)
    {     
        
       $serie = $criador->criarSerie($req);
       $email = new NovaSerie($req->nome,$req->qtd_temporadas,$req->qtd_episodios);
       $email->subject = 'Nova Série Criada';
       $user = $req->user();dd($user);
       Mail::to($user)->send($email);

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
    public function editar(int $id)
    {
 
     $serie = Series::find($id);
     return view('series.edit',compact('serie'));
    }
    
    public function editarPost(Request $req)
    {       
     
        $serieNome = $req->nome;
        $serie = Series::find($req->id);
        $serie->nome = $serieNome;
        $serie->save();
        return view('series.create'); 
    }
}