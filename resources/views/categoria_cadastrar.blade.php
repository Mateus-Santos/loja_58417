@extends('layout.base', ["current"=>"categorias"])

@section('body')
<div class="div_form">
    <form action = "{{route('categorias.store')}}" method = "POST">
        @csrf
        <div class="form-group">
            <div class = "form-group">
                <h2 class="title_form">Cadastro de Categoria</h2>
                <label class="sub_title_form" for="nome">Nome da categoria:</label>
                <input type="text" class="form-control" id="nome" name="nome_categoria">
            </div>
            <button class = "submit_button btn btn-success" type = "submit">Cadastrar!</button>
        </div>
    </form>
</div>
@endsection