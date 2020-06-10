@extends('layout.base', ["current"=>"roupas"])

@section('body')
<div class="show_imagem_container">
        <div class="">
            <img class="img_roupa" src="../storage/{{$roupa->foto_roupa}}"/>
        </div>
        <div class="nome_roupa">
        {{$roupa->nome_roupa}}
        </div>
        <div class="preco_roupa">
        R$: {{$roupa->preco_roupa}}
        </div>
</div>
@endsection