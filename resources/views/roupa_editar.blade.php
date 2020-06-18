@extends('layout.base', ["current"=>"roupas"])

@section('body')
<div class="div_form">
    <form name="formcadastro" action = "{{route('roupas.update', $roupa)}}" method = "POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class = "form-group">
            <div class = "form-group">
                <h2 class="title_form">Cadastro de Roupas</h2>
                <label class="sub_title_form" for="nome_roupa">Nome: </label>
                <input type = "text" class = "form-control" id="nome_roupa" name="nome_roupa" value="{{$roupa->nome_roupa}}">

                <label class="sub_title_form" for="descricao_roupa">Descrição: </label>
                <input  type = "text" class = "form-control" id="descricao_roupa" name="descricao_roupa" value="{{$roupa->descricao_roupa}}">

                <label class="sub_title_form" for="preco_roupa">Preço: </label>
                <input type = "float" class = "form-control" id="preco_roupa" name="preco_roupa" value="{{$roupa->preco_roupa}}">
                
                <label class="sub_title_form" for="nome_tecido">Tecido: </label>
                <input type = "text" class = "form-control" id="nome_tecido" name="nome_tecido" value="{{$roupa->nome_tecido}}">
                
                <label class="sub_title_form" for="id_categoria">Categoria: </label>
                <select class = "form-control" name = "id_categoria" id="id_categoria">
                <option value={{$roupa->id_categoria}}>
                    {{$roupa->categoria["nome_categoria"]}}
                </option>
                @foreach($categorias as $cat)
                    @if($cat->id != $roupa->id_categoria)
                    <option value={{$cat->id}}>{{$cat->nome_categoria}}</option>
                    @endif
                @endforeach
                </select>
                <br/>
                <label class="sub_title_form" for="foto_roupa">Imagem atual</label>
                <input class = "form-control-file" type ="file" id="foto_roupa" name="foto_roupa">
                <img id="image_preview" src="../storage/{{$roupa->foto_roupa}}">
            </div>
                <button class = "submit_button btn btn-success" type = "submit">Cadastrar!</button>
        </div>
    </form>
    
</div>
@endsection