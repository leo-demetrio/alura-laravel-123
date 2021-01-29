<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporada;
use App\Episodio;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada,Request $req)
    {
    	$episodios = $temporada->episodios;
    	$temporadaId = $temporada->id;
        $mensagem = $req->session()->get('mensagem');
    	return view('episodios.index',compact("episodios","temporadaId","mensagem"));

    }

    public function assistidos(Temporada $temporada, Request $req)
    {
    	$assistidos = $req->episodios;
    	$temporada->episodios->each(function (Episodio $episodios) use ($assistidos) {

    		$episodios->assistidos = in_array($episodios->id, $assistidos);
    	});

    	$temporada->push();

        $req->session()->flash('mensagem','Episódios assistidos');

    	return redirect()->back();
    }
}
