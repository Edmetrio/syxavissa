<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Categoria;
use App\Models\Models\Subcategoria;
use App\Models\Models\Tipo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigo = Artigo::with(['categorias','subcategorias','tipos'])->orderBy('id', 'desc')->get();
        return view('artigo', compact('artigo')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artigo = Artigo::with(['categorias','subcategorias','tipos'])->orderBy('id', 'desc')->get();
        $categoria = Categoria::orderBy('id', 'desc')->get();
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        return view('createArtigo', compact('artigo', 'categoria', 'tipo','subcategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
