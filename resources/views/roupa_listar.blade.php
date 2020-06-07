@extends('layout.base', ["current"=>"roupas"])

@section('body')
<h2 class="title_form">Lista de Roupas</h2>
<div class="div_principal_roupa">
    @foreach($roupas as $roupa)
        <div class="div_roupa">
                <td>{{$roupa->nome_roupa}}</td>
                <td>{{$roupa->descricao_roupa}}</td>
                <td>{{$roupa->preco_roupa}}</td>
                <td>{{$roupa->categoria["nome_categoria"]}}</td>
                <td>{{$roupa->foto_roupa}}</td>
                <td>
                  <form>
                    <a class = "btn btn-success">Editar</a>
                    <a class = "btn btn-danger">Excluir</a>
                  </form>  
                </td>
        </div>
    @endforeach
</div>
@endsection