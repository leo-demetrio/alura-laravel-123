@extends('layout')

@section('cabecalho')
Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')

<ul class="list-group">
       

       @foreach($serieTemp as $temp)
        <li class="list-group-item">
            Temporada {{ $temp->numero }}
          
        </li>
        @endforeach
</ul>

@endsection