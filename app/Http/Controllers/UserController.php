<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Hash;
use Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function verPerfil(){
       $usuario = Auth::user();
        return view('pages.perfilUsuario', compact('usuario'));
    }
}