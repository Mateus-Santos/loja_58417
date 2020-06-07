@extends('layout.base', ["current"=>"categorias"])

@section('body')
<div class="div_listar">
<h2 class="title_form">Lixeira Categoria</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categorias as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->nome_categoria}}</td>
            <td>
            <form >
                @csrf
                <a href="{{route('categorias.restore', $cat->id)}}"class="btn btn-success"> Restaurar</a>
                <a href="{{route('categorias.excluirdevez', $cat->id)}}"class="btn btn-danger"> Excluir</a>
            </form>  
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection