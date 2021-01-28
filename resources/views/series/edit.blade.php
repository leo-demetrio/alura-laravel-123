@extends('layout')

@section('cabecalho')
Criar Séries
@endsection


@section('conteudo')


    <a href="/series" class="btn btn-dark ">Home</a>
    <form  action="/series/{{$serie->id}}/editar" method="post">
        @csrf
        <div class="row">
           
                <label for="nome">Nome</label>
                <input value="{{$serie->nome}}" type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">informe seu nome</small>
          
          
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
