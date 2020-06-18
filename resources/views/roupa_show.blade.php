@extends('layout.base', ["current"=>"roupas"])

@section('body')
<div class="show_roupa_container">
        <div class="div_show_image">
            <img class="show_image" src="../storage/{{$roupa->foto_roupa}}"/>
        </div>
        <div class="show_title_roupa">
            {{$roupa->nome_roupa}}
        </div>
    <div class="div_conteudo_roupa_show">
        <p class="conteudo_roupa_show">{{$roupa->descricao_roupa}}</p> 
    </div>
</div>
@endsection