@extends('layout.base', ["current"=>"categorias"])

@section('body')
<div class="div_listar">
<h2 class="title_form">Lixeira Categoria</h2>
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
            <form >
                @csrf
                <a href="{{route('categorias.restore', $cat->id)}}"class="btn btn-success"> Restaurar</a>
                <a href="{{route('categorias.excluirdevez', $cat->id)}}"class="btn btn-danger">
                <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
                  Excluir
                </a>
            </form>  
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection