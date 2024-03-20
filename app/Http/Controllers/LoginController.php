<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){
		if (Auth::check()){
			//Redireccionar usuarios con sesión activa.
			return redirect()->route('post.index', auth()->user()->username);
		}
        return view('auth.login');
    }

    public function store(Request $request){
		
		//dd($request->remember);

        $request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);

		//autentica datos login...
		if (!auth()->attempt($request->only('email','password'), $request->remember)) {
			//si son incorrectos devuelve mensaje de error
			return back()->with('mensaje-login','Email o contraseña incorrecta.');
		}

		//si los datos de login son correctos lleva al muro
		return redirect()->route('post.index', auth()->user()->username);
    }
}
