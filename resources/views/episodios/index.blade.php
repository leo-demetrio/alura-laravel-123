@extends('layout')

@section('cabecalho')
Episodios

<a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
<a href="{{ route('listar_series') }}" class="btn btn-dark mb-2">Lista Séries</a>
@endsection


@section('conteudo')

@include('mensagem',["mesagem" => $mensagem])

<form method="POST" action="/temporada/{{$temporadaId}}/episodios/assistidos">
@csrf
<ul class="list-group">
       

       @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
       
        Episódio {{ $episodio->numero }}
      
         <input 
         type="checkbox" name="episodios[]" value="{{$episodio->id}}"
         {{ $episodio->assistidos ? 'checked' : "" }}> 
         
        </li>
        @endforeach

</ul>
		<button class="btn btn-primary mt-2 mb-2">Enviar</button>
</form>

@endsection