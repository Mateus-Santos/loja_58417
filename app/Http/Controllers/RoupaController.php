<?php

namespace App\Http\Controllers;

use App\Roupa;
use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoupaController extends Controller
{
    public function index()
    {
        $roupas = Roupa::all();
        foreach($roupas as $roupa){
            $roupa->preco_roupa = number_format($roupa->preco_roupa, 2, ',', '.');
            if(!file_exists("../storage/app/public/$roupa->foto_roupa")){
                $roupa->foto_roupa = "images_sistem/nao_encontrada.jpg";
            }
        }
        return view('roupa_listar', compact('roupas'));
    }

    public function create()
    {
        if(auth::check() === true){
            $categorias = Categoria::all();
            return view('roupa_cadastrar', compact('categorias'));
        }
        return view('aviso_login');
    }

    public function store(Request $request)
    {
        if(auth::check() === true){
            $roupa = new Roupa();
            $roupa->nome_roupa = $request->input("nome_roupa");
            $roupa->descricao_roupa = $request->input("descricao_roupa");
            $request->preco_roupa = number_format($request->preco_roupa, 2, ',', '.');
            $roupa->preco_roupa = $request->input("preco_roupa");
            $path = $request->file("foto_roupa")->store('images', 'public');
            $roupa->foto_roupa = $path;
            $roupa->id_categoria = $request->input("id_categoria");
            $roupa->nome_tecido = $request->input("nome_tecido");
            $roupa->save();
            return redirect()->route('roupas.index');
        }
        return view ('aviso_login');
    }

    public function show(Roupa $roupa)
    {
        return view('roupa_show', compact('roupa'));
    }

    public function editar(Roupa $roupa)
    {
        $categorias = Categoria::all();
        return view('roupa_editar', compact('categorias', 'roupa'));
    }


    public function update(Request $request, Roupa $roupa)
    {
        $categorias = Categoria::all();
        if($request->foto_roupa != null){
            $path = $request->file("foto_roupa")->store('images', 'public');
            $roupa->foto_roupa = $path;
            $roupa->save();
        }
        $roupa->nome_roupa = $request->input("nome_roupa");
        $roupa->descricao_roupa = $request->input("descricao_roupa");
        $roupa->preco_roupa = $request->input("preco_roupa");
        $roupa->id_categoria = $request->input("id_categoria");
        $roupa->nome_tecido = $request->input("nome_tecido");
        $roupa->save();
        return view('roupa_editar', compact('categorias', 'roupa'));
    }


    public function destroy(Roupa $roupa)
    {
        if(auth::check() === true){
            $roupa->delete();
            return redirect()->route('roupas.index');
        }
        return view('aviso_login');
    }
}
