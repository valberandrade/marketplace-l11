<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SlideController extends Controller
{

    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slide::all();
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
    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|max:2048',
            'title_one' => 'string|max:255',
            'title_two' => 'required|max:255',
            'starting_price' => 'max:255',
            'link' => 'url',
            'serial' => 'required|integer',
            'status' => 'required'
        ]);

        $imagePath = $this->uploadImage($request, 'banner', 'uploads');

        $data = $request->all();
        $data['banner'] = $imagePath;
        $create = Slide::create($data);

        if ($create){
            toastr()->success('Slide cadastrado com sucesso', 'Sucesso');
            return redirect()->route('admin.slider.index');
        }else{
            toastr()->error('Falha ao cadastrar o slider', 'Erro');
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
}
