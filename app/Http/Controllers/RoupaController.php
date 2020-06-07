<?php

namespace App\Http\Controllers;

use App\Roupa;
use App\Categoria;
use Illuminate\Http\Request;

class RoupaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roupas = Roupa::all();
        return view('roupa_listar', compact('roupas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('roupa_cadastrar', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roupa = new Roupa();
        $roupa->nome_roupa = $request->input("nome_roupa");
        $roupa->descricao_roupa = $request->input("descricao_roupa");
        $roupa->preco_roupa = $request->input("preco_roupa");
        $roupa->foto_roupa = $request->input("foto_roupa");
        $roupa->id_categoria = $request->input("id_categoria");
        $roupa->nome_tecido = $request->input("nome_tecido");
        $roupa->save();
        return redirect()->route('roupas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roupa  $Roupa
     * @return \Illuminate\Http\Response
     */
    public function show(Roupa $roupa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roupa  $Roupa
     * @return \Illuminate\Http\Response
     */
    public function edit(Roupa $roupa)
    {
        //
    }

    public function update(Request $request, Roupa $roupa)
    {
        //
    }

    public function destroy(Roupa $roupa)
    {
        //
    }
}
