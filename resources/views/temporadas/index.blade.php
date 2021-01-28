@extends('layout')

@section('cabecalho')
Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')

<ul class="list-group">
       

       @foreach($serieTemp as $temp)
        <li class="list-group-item d-flex justify-content-between align-items-center">
           <a href="/series/$temp->id/episodios">Temporada {{ $temp->numero }}</a>

           <span class="badge badge-secondary">{{$temp->episodios->count()}}</span>
          
        </li>
        @endforeach
</ul>

@endsection