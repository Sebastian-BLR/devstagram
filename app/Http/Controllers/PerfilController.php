<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }


    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // Pedir contraseña para continuar
        if(!auth() -> attempt(['email' => auth() -> user() -> email,'password' => $request -> password_actual])){
            return back() -> with('mensaje', 'Password Incorrecta');
        }


        $request -> request -> add(['username' => Str::slug($request -> username)]);

        $this->validate($request,[
            'username' => ['required','unique:users,username,' . auth() -> user() -> id,'min:3','max:20', 'not_in:editar-perfil,posts,post',],
            'email'    => ['required','unique:users,email,'.  auth() -> user() -> id,'email','max:60'],
            // sí hay password se le añaden las reglas si no pues no :D
            'password' => $request -> password ? 'confirmed|min:6' : '',
        ]);

        if($request -> imagen){
            $imagenes = $request -> file();

            foreach($imagenes as $imagen){
            $nombreImagen =  Str::uuid() . '.' . $imagen -> extension();
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor -> fit(1000,1000);
    
            $imagenPath = public_path('perfiles') . "/" .  $nombreImagen;
            $imagenServidor -> save($imagenPath);
            }
            }
            
            $usuario   = User::find(auth() -> user() -> id);
            $usuario  -> username  = $request -> username;
            $usuario  -> imagen    = $nombreImagen ?? auth() -> user() -> imagen ?? null;
            $usuario  -> email     = $request -> email;
            // Sí hay password se ejecuta el Hash
            !$request -> password ?: $usuario -> password = Hash::make($request -> password);
            $usuario  -> save();

            return redirect() -> route('posts.index', $usuario -> username);
        
    }
}
