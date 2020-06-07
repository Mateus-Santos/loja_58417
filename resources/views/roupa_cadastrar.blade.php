@extends('layout.base', ["current"=>"roupas"])

@section('body')
<div class="div_form">
    <form action = "{{route('roupas.store')}}" method = "POST">
        @csrf
        <div class = "form-group">
            <div class = "form-group">
                <h2 class="title_form">Cadastro de Roupas</h2>
                <label class="sub_title_form" for="nome_roupa">Nome: </label>
                <input type = "text" class = "form-control" id="nome_roupa" name="nome_roupa">

                <label class="sub_title_form" for="descricao_roupa">Descrição: </label>
                <input  type = "text" class = "form-control" id="descricao_roupa" name="descricao_roupa">

                <label class="sub_title_form" for="preco_roupa">Preço: </label>
                <input type = "float" class = "form-control" id="preco_roupa" name="preco_roupa">
                
                <label class="sub_title_form" for="nome_tecido">Tecido: </label>
                <input type = "text" class = "form-control" id="nome_tecido" name="nome_tecido">
                
                <label class="sub_title_form" for="id_categoria">Categoria: </label>
                <select class = "form-control" name = "id_categoria" id="id_categoria">
                @foreach($categorias as $cat)
                    <option value={{$cat->id}}>{{$cat->nome_categoria}}</option>
                @endforeach
                </select>
                <br/>
                <label class="sub_title_form" for="foto_roupa">Foto: </label>
                <input type ="file" id="foto_roupa" name="foto_roupa">

            </div>
                <button class = "submit_button btn btn-success" type = "submit">Cadastrar!</button>
        </div>
    </form>
</div>
@endsection