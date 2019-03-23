@extends('layout.base', ["current"=>"categorias"])

@section('body')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categorias as $cat)
        <tr>       
            <td>{{$cat->id}}</td>
            <td>{{$cat->nome}}</td>
            <td>
            <form>
                @csrf
                <button type = "submit" class = "btn btn-danger">Restaurar(ainda sem view e metodo...)</button>
            </form>  
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection