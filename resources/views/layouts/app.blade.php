<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
		@vite('resources/css/app.css')
		@stack('styles') <!-- permite agregar hojas de estilo en lugares particulares -->
		@vite('resources/js/app.js')
    </head>
    <body class="bg-gray-100">		
        <header class="p-5 border-b bg-white shadow">
			<div class="container mx-auto flex justify-between items-center">
				<h1 class="text-3xl font-black">DevStragram</h1>
				
				@auth
					<nav class="flex gap-2 items-center">
						<a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer" href="{{route('post.create')}}">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>Crear
						</a>
						<a class="font-bold text-gray-600 text-sm" href="{{route('post.index', auth()->user()->username)}}">
							Hola: <span class="font-normal">{{auth()->user()->username}}</span>
						</a>
						<form method="POST" action="{{route('logout')}}">
							@csrf
							<button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar sesión</button>
						</form>
					</nav>
				@endauth

				@guest
					<nav class="flex gap-2 items-center">
						<a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
						<a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear cuenta</a>
					</nav>
				@endguest
			</div>
		</header>

		<main class="container mx-auto mt-10">
			<h2 class="font-black text-center text-3xl mb-10">
				@yield('titulo')
			</h2>
			@yield('contenido')
		</main>

		<footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
			DevStagram - Todos los derechos reservados {{ now()->year }}
		</footer>
    </body>
</html>