<!-- apuntan directo a views como primer directorio -->
<!-- Los directorios se separan con . (punto) en lugar de / -->
@extends('layouts.app')

<!-- push invoca al stack de app.blade.php -->
@push('styles') 
	<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Publicá en DevStagram
@endsection


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-6/12 lg:w-6/12 rounded-lg p-5">
            <form id="dropzone" 
                action="{{route('imagenes.store')}}" 
                enctype="multipart/form-data" 
                method="POST" 
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
				    @csrf
			</form>
        </div>

        <div class="md:w-6/12 lg:w-6/12 bg-white rounded-lg shadow-xl p-5">
            <form action="#" method="POST">
                @csrf <!-- CSRF crea un campo oculto que valida al recibir los datos del formulario para evitar ataques -->
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Título de la publicación" class="border p-3 w-full rounded-lg @error('name') border-red-400 @enderror" value="{{ old('titulo') }}"/>
                    @error('name')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

				<div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación" class="border mb-5 p-3 w-full rounded-lg @error('name') border-red-400 @enderror">{{ old('descripcion') }}</textarea>
                    @error('name')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
					<input type="submit" value="Crear Publicación" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
                </div>
            </form>
        </div>
    </div>
@endsection