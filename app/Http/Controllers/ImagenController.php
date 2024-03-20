<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagenController extends Controller{
    
    public function store(){
        return "desde imagen controller";
    }
}




        // //$input = $request->all();
        // //return response()->json($input); //json convierte la respuesta a un lenguaje de transporte. Comunica el backend con el frontend
        // $imagen = $request->file('file'); //con ese nombre viene del formulario
        // //se crea con uuid() un token único por imagen.
        // $nombreImagen = Str::uuid().".".$imagen->extension();
        // //se crea la imagen que se va a almacenar en el servidor... el método make es de intervention
        // //$imagenServidor = Image::make($imagen)->resize(1000);
        // //$imagenServidor->fit(1000);
		
		// $imagenServidor = ImageManager::imagick()->read($nombreImagen)->resize(1000);
		// dd($imagenServidor);
        // //desde la carpeta public crea la carpeta uploads
		// if (!File::isDirectory(public_path('imagenes'))) {
		// 	File::makeDirectory(public_path('imagenes'), 0644);
		// }
        // $imagenPath = public_path('/imagenes').'/'.$nombreImagen;

        // $imagenServidor->save($imagenPath);

        // return response()->json(['imagen' => $nombreImagen]);

		//dd("testeo...");
		//$imagen = $request->file('file');
        //dd($request->file('file'));
        //$nombreImagen = Str::uuid() . "." . $imagen->extension();
        //$imagenServidor = Image::configure(['driver' => 'imagick']);
        //$imagenServidor = Image::make($imagen);
        //$imagenServidor->fit(1000, 1000);
 
        //$imagenPath = public_path('imagenes') . '/' . $nombreImagen;
        //$imagenServidor->save($imagenPath);
		
        
        //$imagenPath = public_path('/');
		//if(!is_dir(public_path('imagenes'))){
        //    mkdir('imagenes');
		//	$imagenPath = public_path('imagenes/');
        //}
		//$imagenServidor->save(public_path($imagenPath.$nombreImagen));
 
 
        //return response()->json(['imagen' => $nombreImagen]);
