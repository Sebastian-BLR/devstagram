@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth() -> user() -> username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow-lg p-6">
        <form action="{{ route('perfil.store')}}" class="mt-5 md:mt:0" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class=" mb-5">
                <label  for='username' class="mb-2 block uppercase text-gray-500 font-bold">
                    Username*
                </label>
                <input type="text" id="username" name='username' placeholder="Tu Nombre de Usuario"
                    class="border p-3 w-full rounded-lg 
                    @error('name') border-red-600   @enderror" 
                    value="{{ auth() -> user() -> username}}"/>
                   
                    @error('username')
                        <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
            </div>

            <div class=" mb-5">
                <label  for='email' class="mb-2 block uppercase text-gray-500 font-bold">
                    Email*
                </label>
                <input type="text" id="email" name='email' placeholder="Tu nuevo email"
                    class="border p-3 w-full rounded-lg 
                    @error('name') border-red-600   @enderror" 
                    value="{{ auth() -> user() -> email}}"/>
                   
                    @error('email')
                        <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
            </div>

            <div class=" mb-5">
                <label  for='imagen' class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                </label>
                <input type="file" id="imagen" name='imagen' class="border p-3 w-full rounded-lg " accept=".jpg, .jpeg, .png">
            </div>

            <div class=" mb-5">
                <label  for='password_actual' class="mb-2 block uppercase text-red-500 font-bold ">
                    Actual Password*
                </label>
                <input type="password" id="password_actual" name='password_actual' placeholder="Pon tu password actual"
                    class="border p-3 w-full rounded-lg " />
            </div>

            @if(session('mensaje'))
                    <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                        {{session('mensaje')}}
                    </p>
                @endif


                <div class=" mb-5">
                    <label  for='password' class="mb-2 block uppercase text-gray-500 font-bold">
                        Nuevo Password
                    </label>
                    <input type="password" id="password" name='password' placeholder="Tu Password"
                        class="border p-3 w-full rounded-lg 
                        @error('password') border-red-600   @enderror" />

                        @error('password')
                            <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                                {{$message}}
                            </p>
                        @enderror
                </div>

                <div class=" mb-5">
                    <label  for='password_confirmation' class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Nuevo Password
                    </label>
                    <input type="password" id="password_confirmation" name='password_confirmation' placeholder="Repite Password"
                        class="border p-3 w-full rounded-lg" />
                </div>

            <input type="submit" value="Guardar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        
        </form>
        </div>
@endsection