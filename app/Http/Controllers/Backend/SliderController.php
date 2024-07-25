<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\UploadImageTraits;

class SliderController extends Controller
{
    use UploadImageTraits;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderFormRequest $request)
    {

        $slider = $request->all();

        $imagePath = $this->uploadImage($request, 'banner', 'uploads');

        $slider['banner'] = $imagePath;

        $create = Slider::create($slider);

        if ($create){
            toastr()->success('Slider cadastrado com sucesso');
            return redirect()->route('admin.slider.index');
        }else{
            toastr()->error('Erro ao cadastrar o Slider, tente novamente!');
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
    public function edit(Slider $slider)
    {
//        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $dados = $request->all();

        $imagePath = $this->updateImage($request, 'banner', 'uploads', $slider->banner);

        $dados['banner'] = empty(!$imagePath) ? $imagePath : $slider->banner;

        $update = $slider->update($dados);

        if ($update){
            toastr()->success('Slider atualizado com sucesso');
            return redirect()->back();
        }else{
            toastr()->error('Erro ao atualizar o Slider, tente novamente!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();

        return response(['status' => 'success', 'message' => 'Excluído com sucesso']);
    }
}
