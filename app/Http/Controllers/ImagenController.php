<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagenes = $request -> file();

        foreach($imagenes as $imagen){
        $nombreImagen =  Str::uuid() . '.' . $imagen -> extension();
        
        $imagenServidor = Image::make($imagen);
        $imagenServidor -> fit(1000,1000);

        $imagenPath = public_path('uploads') . "/" .  $nombreImagen;
        $imagenServidor -> save($imagenPath);
        }

        return response() -> json(['imagen' => $nombreImagen]);

    }
}
