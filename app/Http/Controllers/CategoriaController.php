<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Função para listar.
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria_listar', compact('categorias'));
    }
    
    //Função para chamar a view de cadastrar.
    public function create()
    {
        return view('categoria_cadastrar');
    }

    //Função para cadastrar no banco de dados.
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome_categoria = $request->input("nome_categoria");
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    //Função para puxar um determinado item.
    public function show(Categoria $categoria)
    {
        //
    }

    //Função para chamar a view com os dados para editar.
    public function edit(Categoria $categoria)
    {
        return view('categoria_editar', compact('categoria'));
    }

    //Função para atualizar no banco de dados.
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->nome_categoria = $request->input("nome_categoria");
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    //Função para excluir um item(não definitivamente pois é possivel restaurar)
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }

    //Função para restaurar o item na lista.
    public function restore($id){
        $categoria = Categoria::onlyTrashed()->find($id);
        $categoria->restore();
        return redirect()->route('categorias.index');
        
    }

    public function indexWithTrashed(){
        $categorias = Categoria::onlyTrashed()->get();
        return view('categoria_restaurar', compact('categorias'));
    }

    //Função para excluir definitivamente um item do banco de dados.
    public function excluirdevez($id){
        $categoria = Categoria::onlyTrashed()->find($id);
        $categoria->forceDelete();
        return redirect()->route('categorias.restore');
        
    }
}
