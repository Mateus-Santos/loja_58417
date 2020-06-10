<?php

namespace App\Http\Controllers;

use App\Roupa;
use App\Categoria;
use Illuminate\Http\Request;

class RoupaController extends Controller
{
    public function index()
    {
        $roupas = Roupa::all();
        foreach($roupas as $roupa){
            $roupa->preco_roupa = number_format($roupa->preco_roupa, 2, ',', '.');
        }
        return view('roupa_listar', compact('roupas'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('roupa_cadastrar', compact('categorias'));
    }

    public function store(Request $request)
    {
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

    public function show(Roupa $roupa)
    {
        return view('roupa_show', compact('roupa'));
    }

    public function edit(Roupa $roupa)
    {
        $categorias = Categoria::all();
        return view('roupa_editar', compact('categorias', 'roupa'));
    }

    public function update(Request $request, Roupa $roupa)
    {
        $roupa->nome_roupa = $request->input("nome_roupa");
        $roupa->descricao_roupa = $request->input("descricao_roupa");
        $request->preco_roupa = number_format($request->preco_roupa, 2, ',', '.');
        $roupa->preco_roupa = $request->input("preco_roupa");
        $roupa->id_categoria = $request->input("id_categoria");
        $roupa->nome_tecido = $request->input("nome_tecido");
        $roupa->save();
        return redirect()->route('roupas.index');
    }


    /*public function trocarimagemview(Request $request, Roupa $roupa){
        return view('roupa_editarimg', compact('roupa'));
    }
    public function trocarimagem(Roupa $roupa){
        $path = $request->file("foto_roupa")->store('images', 'public');
        $roupa->foto_roupa = $path;
    }*/
    public function destroy(Roupa $roupa)
    {
        //
    }
}
