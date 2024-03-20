<!-- apuntan directo a views como primer directorio -->
<!-- Los directorios se separan con . (punto) en lugar de / -->
@extends('layouts.app')

@section('titulo')
    Iniciar sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen inicio de sesión de usuarios" class="rounded-lg" >
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('login')}}" method="POST">
                @csrf <!-- CSRF crea un campo oculto que valida al recibir los datos del formulario para evitar ataques -->

                <!-- mensaje-login se arma en el controlador de login después de auntenticar los datos. Si no coinciden muestra el mensaje que se almacena en la variable session -->
                @if (session('mensaje-login'))
                    <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje-login') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    <input id="email" name="email" type="text" placeholder="Tu e-mail de registro" class="border p-3 w-full rounded-lg @error('email') border-red-400 @enderror" value="{{ old('email') }}" />
					@error('email')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" type="password" placeholder="Tu password de registro" class="border p-3 w-full rounded-lg @error('password') border-red-400 @enderror" />
					@error('password')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
					<input type="checkbox" name="remember" /> <label class="text-gray-500 text-sm">Mantener sesión iniciada</label>
                </div>
                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
            </form>
        </div>
    </div>
@endsection