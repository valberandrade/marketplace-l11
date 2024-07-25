<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(ProfileFormRequest $request)
    {
        $user = Auth::user();

        if ($request->hasFile('image')){
            //VERIFICA SE EXISTE E REMOVE A IMAGEM
            if (File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'-msflix-'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = '/uploads/'.$imageName;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Perfil atualizado com sucesso');

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordFormRequest $request)
    {
        $dados = $request->all();
        $dados['password'] = bcrypt($dados['password']);
        Auth::user()->update($dados);
        toastr()->success('Senha atualizada com sucesso');
        return redirect()->back();
    }
}
