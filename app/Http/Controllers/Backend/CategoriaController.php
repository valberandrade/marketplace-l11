<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasFormRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriasFormRequest $request)
    {
        $categoria = $request->all();
        $categoria['slug'] = Str::slug($categoria['nome']);
        $store = Categoria::create($categoria);

        if ($store){
            toastr()->success('Categoria cadastrada com sucesso');
            return redirect()->route('admin.categoria.index');
        }else{
            toastr()->error('Erro ao cadastrar a categoria, tente novamente!');
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
        $categoria = Categoria::findOrFail($id);
        return view('admin.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nome' => ['required', 'string', 'unique:categorias,nome,'.$id],
                'slug' => ['url'],
                'icone' => ['required', 'not_in:empty'],
                'status' => ['required']
            ]
        );

        $categoria = Categoria::findOrFail($id);

        $dados = $request->all();
        $dados['slug'] = Str::slug($dados['nome']);

        $update = $categoria->update($dados);

        if ($update){
            toastr()->success('Categoria atualizada com sucesso');
            return redirect()->back();
        }else{
            toastr()->error('Erro ao editar a categoria, tente novamente!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $del = $categoria->delete();

        if ($del){
            return response(['status' => 'success', 'message' => 'Excluído com sucesso']);
        }else{
            return response(['status' => 'error', 'message' => 'Erro ao excluir']);
        }

    }


    /**
     * Muda Status com ajax
     */
    public function mudaStatus(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->status = $request->status == 'true' ? 1 : 0;

        if($categoria->save()){
            return response(['message' => 'Status Atualizado com sucesso']);
        }else{
            return response(['error' => 'Falha ao atualizar o status']);
        }

    }
}
