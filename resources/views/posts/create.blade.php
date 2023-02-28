@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
    
@section('titulo')
Crea una nueva publicación
@endsection


@section('contenido')
    <div class=" lg:flex lg:items-center gap-10 justify-center">

        <div class="lg:w-6/12 lg:ml-10">
            <form    class='dropzone border-dashed 
                            border-2 w-full lg:h-96
                            md:h-80
                            rounded flex flex-col 
                            justify-center 
                            items-center'
             
                            id = 'dropzone' action="{{route('imagenes.store')}}" method="post" enctype="multipart/form-data"  >
            @csrf
            </form>
        </div>
        
        <div class="lg:w-6/12 p-2 lg:p-10  bg-white rounded-lg shadow-xl mt-10 lg:mt-0  lg:mr-10">
            <form action="{{route('posts.store')}}" method="POST" novalidate>
                
                @csrf
                <div class=" mb-5">
                    <label  for='titulo' class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input type="text" id="titulo" name='titulo' placeholder="Ejemplo: Creando proyecto en Laravel"
                        class="border p-3 w-full rounded-lg 
                        @error('name') border-red-600   @enderror" 
                        value="{{ old('titulo')}}"/>
                       
                        @error('titulo')
                            <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                                {{$message}}
                            </p>
                        @enderror
                </div>

                <div class=" mb-5">
                    <label  for='descripcion' class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                              id="descripcion" 
                              name='descripcion' 
                              placeholder="Ejemplo: Creando proyecto en Laravel"
                              class="border p-3 w-full rounded-lg @error('name') border-red-600   @enderror"
                             >{{ old('descripcion')}}</textarea>
                       
                        @error('descripcion')
                            <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                                {{$message}}
                            </p>
                        @enderror
                </div>
                <div class="mb-5 ">
                    <input type="hidden"
                           name='imagen'
                           value="{{ old('imagen') }}">
                </div>

                @error('imagen')
                            <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                                {{$message}}
                            </p>
                        @enderror
                <input type="submit" value="Publicar"
                class="bg-sky-600 hover:bg-sky-700
                       transition-colors cursor-pointer
                       uppercase font-bold w-full p-3
                     text-white rounded-lg">

             </form>
        </div>
     </div>
@endsection