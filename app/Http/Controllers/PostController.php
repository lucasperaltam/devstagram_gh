<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(User $user){
        return view('auth.dashboard', ['user' => $user]);
    }

    public function create(){
        //apunta a la carpeta view y de ahí se pone la carpeta y el nombre del archivo (el . reemplaza a la / de directorio)
        return view('posts.create');
    }
}