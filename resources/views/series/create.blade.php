@extends('layout')

@section('cabecalho')
Criar Séries
@endsection


@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
    @endif
    
    <a href="/series" class="btn btn-dark mb-2">Home</a>
    <form  method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">informe seu nome</small>
            </div>
            <div class="col col-2">
                <label for="qtd_temporadas">Qtd. Temp.</label>
                <input type="number" name="qtd_temporadas" class="form-control" id="qtd_temporadas" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Qtd temp.</small>
            </div>        
            <div class="col col-2">
                <label for="ep_por_temporadas">Nº Eps.</label>
                <input type="number" name="ep_por_temporadas" class="form-control" id="ep_por_temporadas" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Nº eps.</small>
            </div>            
        </div>
        <div class="row">
            <div class="col col-12">
                <label for="capa">Capa</label>
                <input type="text" name="capa" class="form-control" id="capa">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
