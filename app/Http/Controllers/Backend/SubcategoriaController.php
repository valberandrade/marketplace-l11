<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoriaFormRequest;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('admin.subcategoria.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.subcategoria.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoriaFormRequest $request)
    {
        $dados = $request->all();
        $dados['slug'] = Str::slug($dados['nome']);
        $store = Subcategoria::create($dados);

        if ($store){
            toastr()->success('Subcategoria cadastrada com sucesso');
            return redirect()->route('admin.subcategoria.index');
        }else{
            toastr()->error('Erro ao cadastrar a subcategoria, tente novamente!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Muda Status com ajax
     */
    public function mudaStatusSub(Request $request)
    {
        $subcategoria = Subcategoria::findOrFail($request->id);
        $subcategoria->status = $request->status == 'true' ? 1 : 0;
        $subcategoria->save();
        return response(['message' => 'Status Atualizado com sucesso']);

    }
}
