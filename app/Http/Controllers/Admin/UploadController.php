<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function imageupload(Request $request){
        /*Validação*/
        $request->validate([
            'file'=> 'required', 'image', 'jpeg', 'jpg', 'png'
        ]);
        //Pegar extensão e nome da imagem
        $ext = $request->file->extension();
        $imageName = time().'.'.$ext;
        //Mover para a pasta public
        $request->file->move(public_path('media/images'), $imageName);

        //gerar o link do arquivo. url da imagem
        return [
            'location'=> asset('media/images/'.$imageName)
        ];
    }
}
