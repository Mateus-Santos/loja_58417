@extends('layout.base', ["current"=>"categorias"])

@section('body')
<div class="div_listar">
<h2 class="title_form">Lista de Categoria</h2>
<table class="table table-striped table-dark">
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
            <form action = "{{route('categorias.destroy', $cat)}}" method = "POST">
                @csrf
                <a class = "btn btn-primary" href="{{route('categorias.edit', $cat)}}">Editar</a>
                @method('DELETE')
                <button type = "submit" class = "btn btn-danger">Excluir</button>
            </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection