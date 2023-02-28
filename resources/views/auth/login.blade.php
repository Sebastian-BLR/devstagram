@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-6/12 md:mb-0 mb-3 p-3">
            <img src="{{ asset('img/login.jpg')}}" alt="Imangen login usuario">
        </div>

        
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('login')}}" method="POST" novalidate>        
                @csrf

                @if(session('mensaje'))
                    <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                        {{session('mensaje')}}
                    </p>
                @endif

                <div class=" mb-5">
                    <label  for='email' class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="email" id="email" name='email' placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg 
                        @error('email') border-red-600   @enderror" 
                        value="{{ old('email')}}"/>

                        @error('email')
                            <p class=" bg-red-600 text-white my-2 rounded-lg text-sm p-1 text-center font-bold">
                                {{$message}}
                            </p>
                        @enderror
                </div>

                <div class=" mb-5">
                    <label  for='password' class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
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

                <div class="mb-5">
                    <input type="checkbox" name="remember"><label class="uppercase text-gray-500 font-bold text-sm" for="remember"> Mantener mi Sesión</label>
                </div>

                <input type="submit" value="Iniciar Sesión"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection
