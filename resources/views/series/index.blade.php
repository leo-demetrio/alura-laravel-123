@extends('layout')

@section('cabecalho')
Listar Séries
@endsection

@section('conteudo')

    @if(!empty($mnes))
    <div class="alert alert-success">
    {{ $mnes}}
    </div>
    @endif

    <a href="{{ route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->nome }}

            <span class="d-flex">
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-external-link-alt" aria-hidden="true"></i>
            </a>
            <form action="/series/{{ $serie->id }}" method="post" onsubmit="return confirm('Tem certeza')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
            </span>
        </li>
        @endforeach
    </ul>
@endsection
</body>
</html>