<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    //Função para listar.
    public function index()
    {
        if(auth::check() === true){
            $categorias = Categoria::all();
            return view('categoria_listar', compact('categorias'));
        }
        return view('aviso_login');
    }
    
    //Função para chamar a view de cadastrar.
    public function create()
    {
        if(auth::check() === true){
            return view('categoria_cadastrar');
        }
        return view('aviso_login');
    }

    //Função para cadastrar no banco de dados.
    public function store(Request $request)
    {
        if(auth::check() === true){
            $categoria = new Categoria();
            $categoria->nome_categoria = $request->input("nome_categoria");
            $categoria->save();
            return redirect()->route('categorias.index');
        }
        return view('aviso_login');
    }

    //Função para chamar a view com os dados para editar.
    public function edit(Categoria $categoria)
    {
        if(auth::check() === true){
            return view('categoria_editar', compact('categoria'));
        }
        return view('aviso_login');
    }

    //Função para atualizar no banco de dados.
    public function update(Request $request, Categoria $categoria)
    {
        if(auth::check() === true){
            $categoria->nome_categoria = $request->input("nome_categoria");
            $categoria->save();
            return redirect()->route('categorias.index');
        }
        return view('aviso_login');
    }

    //Função para excluir um item(não definitivamente pois é possivel restaurar)
    public function destroy(Categoria $categoria)
    {
        if(auth::check() === true){
            $categoria->delete();
            return redirect()->route('categorias.index');
        }
        return view('aviso_login');
    }

    //Função para restaurar o item na lista.
    public function restore($id){
        if(auth::check() === true){
            $categoria = Categoria::onlyTrashed()->find($id);
            $categoria->restore();
            return redirect()->route('categorias.index');
        }
        return view('aviso_login');
    }

    public function indexWithTrashed(){
        if(auth::check() === true){
            $categorias = Categoria::onlyTrashed()->get();
            return view('categoria_restaurar', compact('categorias'));
        }
        return view('aviso_login');
    }

    //Função para excluir definitivamente um item do banco de dados.
    public function excluirdevez($id){
        if(auth::check() === true){
            $categoria = Categoria::onlyTrashed()->find($id);
            $categoria->forceDelete();
            return redirect()->route('categorias.restore');
            
        }
        return view('aviso_login');
    }
}
