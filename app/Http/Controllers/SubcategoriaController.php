<?php

namespace App\Http\Controllers;

use App\Models\Models\Categoria;
use App\Models\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategoria = Subcategoria::with(['categorias'])->orderBy('id', 'desc')->get();
        return view('subcategoria', compact('subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::with(['subcategorias'])->orderBy('id', 'desc')->get();
        return view('createSubcategoria', compact('categoria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/subcategoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria = Subcategoria::create($input);
        if($subcategoria)
            {
                $request->session()->flash('status', 'Subcategoria adicionada');
                return redirect('subcategoria');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('subcategoria');
    }

 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $subcategoria = Subcategoria::with('categorias')->find($id);
        $categoria = Categoria::orderBy('id', 'desc')->get();
        return view('createSubcategoria', compact('subcategoria','categoria'));
    }


    public function update(Request $request, Subcategoria $subcategoria, $id)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/subcategoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria = Subcategoria::find($id)->update($input);
        if($subcategoria)
            {
                $request->session()->flash('status', 'Subcategoria Alterada');
                return redirect('subcategoria');
            }
            $request->session()->flash('status', 'Erro ao Alterar!');
            return redirect('subcategoria');
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
