<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStagram - @yield('titulo')</title>
    @stack('styles')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body class="bg-gray-100">
    
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex flex-col sm:flex-row gap-2 justify-between items-center">
        <a class=" text-3xl md:text-4xl font-black" href="{{ route('home') }}">DevStagram</a> 
            


            @auth
            <nav class="flex gap-2 w-full justify-between sm:w-auto items-center  text-xs md:text-sm">
               
                <a class="font-bold  text-gray-200  bg-indigo-600 rounded-md p-1 flex gap-1 items-center" 
                    href="{{ route('posts.index', auth() -> user() -> username)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                      </svg>
                      <span class=" text-base">{{ auth() -> user() -> username }}</span>
                </a>

                <a href="{{ route('posts.create')}}" class="flex items-center gab-5 bg-slate-100 uppercase border p-1 text-gray-600 rounded-md font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg><span class=" ml-1">Crear</span>
                </a>
                
                <form action="{{ route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="font-bold uppercase text-gray-600 bg-slate-200 p-2 rounded-md">Cerrar Sesión</butto>
                </form>
            </nav>    
            @endauth

            @guest
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-xs md:text-sm bg-slate-200 p-2 rounded-md" href="{{ route('login')}}">Login</a>
                <a class="font-bold uppercase text-gray-600 text-xs md:text-sm bg-slate-200 p-2 rounded-md" href="{{ route('register')}}">Crear cuenta</a>
            </nav>
            @endguest
            
        </div>
    </header>

    <main class ="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>
    
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los derechos reservados {{ now() -> year }}

    </footer>
    @livewireScripts
</body>
</html>