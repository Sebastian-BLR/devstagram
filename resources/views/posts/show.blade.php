@extends('layouts.app')

@section('titulo')
{{$post -> titulo}}
@endsection

@section('contenido')
    <div class=" container mx-auto md:flex justify-center">
        <div class='md:w-4/12 p-5'>
            <img class=" rounded-xl" src="{{ asset('uploads') . "/" . $post-> imagen}}" alt="Imagen del post {{ $post -> titulo}}">
            
            <div class="py-3 flex items-center justify-between">
            
                <div>
                    <p class=" font-bold"> {{$post -> user -> username}}</p>
                    <p class=" text-sm text-gray-500 ">{{$post -> created_at -> diffForHumans()}}</p>
                </div>
                
                <div class="flex items-center gap-3 justify-between">
                    @auth

                    <livewire:like-post :post="$post" />
                    
                    @endauth
                    </div>
            
            </div>
            
            <p class=" mt-5 text-justify">{{$post -> descripcion}}</p>
            
            @auth
                @if($post -> user_id === auth()-> user() -> id)        
                <form action="{{ route('posts.destroy', $post)  }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="bg-red-500 hover:bg-red-700 
                    p-2 rounded-md text-white 
                    font-bold mt-4 cursor-pointer" value="Eliminar Publicación" type="submit" >
                </form>
                @endif
            @endauth
        </div>


        <div class='md:w-1/2 p-5'>
            @auth
            <div class=" shadow-lg p-7 rounded-xl bg-white mb-2">
                        <p class=" text-xl font-bold text-center mb-7">Agrega un Comentario</p>

                        @if(session('mensaje'))
                            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold shadow-md shadow-slate-500">
                                {{ session('mensaje') }}
                            </div>
                        @endif
                        <form  method="POST"
                               action=" {{route('comentarios.store', ['post' => $post, 'user' => $user])}}
                        ">
                          @csrf  
                            <div class=" mb-5">
                                <label  for='comentario' class="mb-2 block uppercase text-gray-500 font-bold">
                                    Añade un comentario
                                </label>
                                <textarea 
                                id="comentario" 
                                name='comentario' 
                                placeholder="Agrega un Comentario"
                                class="border p-3 w-full rounded-lg @error('name') border-red-600   @enderror"
                                ></textarea>
                                
                                @error('comentario')
                                <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            
                            <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700
                            transition-colors cursor-pointer
                            uppercase font-bold w-full p-3
                            text-white rounded-lg">
                        </form>
                        
                    </div> 
                    @endauth

            <div class=" shadow-lg md:px-7 rounded-xl bg-white my-5 max-h-96 overflow-y-scroll ">
                @if ($post -> comentarios -> count())
                    @foreach ($post -> comentarios as $comentario)

                        <div class="px-3 py-2 border-gray-400 border-b ">
                            
                            <div class="text-sm flex justify-between items-center">
                        
                                <a href="{{ route("posts.index", $comentario -> user) }}" class="font-bold text-gray-700 text-lg p-1">
                                    {{ $comentario -> user -> username; }}
                                </a>
                                {{-- <p class=" text-gray-400"> 0 Likes</p> --}}
                               
                        
                            </div>
                            
                            <p class=" text-gray-600">{{ $comentario -> comentario }}</p>
                            
                            <p class=" text-gray-400">
                                {{ $comentario -> created_at -> diffForHumans() }}
                            </p>
                        </div>
                       


                        
                    @endforeach                    
                @else
                    <p class=" p-10 text-center text-gray-300">Sin Comentarios</p>
                @endif
            </div>
        </div>
    </div>

@endsection