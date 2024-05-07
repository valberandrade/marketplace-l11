<?php

namespace App\Traits;


use Illuminate\Http\Request;

trait UploadImageTrait
{

    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)){

            $image = $request->$inputName;
            $ext = $image->getClientOriginalName();
            $imageName = 'media-'.uniqid().'-msflix-'.date('d-m-Y').'-'.$ext;
            $image->move(public_path($path), $imageName);

            return $path.'/'.$imageName;
        }
    }

}
