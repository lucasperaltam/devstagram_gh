<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function index(){
		if (Auth::check()){
			//Redireccionar usuarios con sesión activa.
			return redirect()->route('post.index', auth()->user()->username);
		}

		return view('auth.register'); //se usa . como barra de directorio (al parecer también funciona con /)
	}

	//guardar
	public function store(Request $request){
		//modificar el request
		$request->request->add(['username' => Str::slug($request->username)]);

		$request->validate([
			'name' => 'required|min:5|max:30',
			'username' => 'required|unique:users|min:3|max:20',
			'email' => 'required|unique:users|email|max:60',
			'password' => 'required|confirmed|min:6'
		]);

		//Se hace el INSERT INTO
		//User -> modelo usuario ubicado en app/Models/User.php
		User::create([
			//campo_bd + regla y campo del form donde lo lee
			'name' => $request->name,
			//'username' => Str::slug($request->username),
			'username' => $request->username, //como fue modificado el request antes, se lee normal
			'email' => $request->email,
			//'password' => $request->password //al parecer ya encripta la contraseña, pero el curso muestra como encriptarla
			'password' => Hash::make($request->password) 
		]);

		//Forma 2 de autenticar
		auth()->attempt($request->only('email','password'));

		//redireccionar a la página luego de guardar.
		return redirect()->route('post.index', auth()->user()->username); //sería la del feed del usuario logueado
	}
}
