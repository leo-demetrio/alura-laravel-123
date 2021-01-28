@extends('layout')

@section('cabecalho')
Listar Séries
@endsection

@section('conteudo')

    @if(!empty($mnes))
    <div class="alert alert-success">
    {{$mnes}}
    </div>
    @endif

    <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50"  hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{$serie->nome}}">
                <div class="input-group-append">
                    <button onclick="editarSerie(<?php echo $serie->id ?>)" class="btn btn-primary">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>               
            </div>

           
            <span class="d-flex">
                <a href="/series/{{ $serie->id }}/editar" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-edit"></i>
                </a> 
                <!-- <button class="btn btn-info btn-sm mr-1" onclick="toggleInput(<?php echo $serie->id ?>)">
                    <i class="fas fa-edit"></i>
                </button>   -->         

                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                </a>

                <form action="/series/{{ $serie->id }}" method="post" onsubmit="return confirm('Tem certeza')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                </form>

            </span>
        </li>
        @endforeach
    </ul>

    <script>
        function toggleInput(serieId){

            const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);

            if(nomeSerieEl.hasAttribute('hidden')){

            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;

            } else {

            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;

            }
        }

       
        function editarSerie(serieId){

            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
            let token = document.querySelector('input[name ="_token"]').value;
            const url = `/series/${serieId}/editar`;

            

            formData.append('nome', nome);
            formData.append('_token', token);
            // for (let [key, value] of formData) {
            // console.log(`${key}: ${value}`)
            // }
            // console.log(nome);
            // console.log(token);
            // console.log(url);


            fetch(url, {method: "POST",body: formData})
            .then(() => {
                toggleInput(serieId);
                //document.getElementById(`#input-nome-serie-${serieId}`).textContent = nome;
            })
            .catch((e) => {
                console.log(e);
            });
            
           
        }
         
    </script>
@endsection










<!-- <a href="{{ route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>
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
    </ul> -->