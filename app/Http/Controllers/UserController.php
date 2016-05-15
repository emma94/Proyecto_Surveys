<?php namespace App\Http\Controllers;

use Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function verPerfil(){
       $usuario = Auth::user();
        $msjExito = "";
        return view('pages.perfilUsuario', compact('usuario','msjExito'));
    }
    
    public function modificarDatos(){
        $input=Request::all();
        $usuario = Auth::user();
        $msjExito = "";

        $validador = $this->validarUpd($input);
        if($validador->fails()){
            $errors = $validador->errors();
            return  view('pages.perfilUsuario', compact('usuario','errors','msjExito'));
        } else{
            $usuario->nombreCompleto = $input['nombreCompleto'];
            $usuario->carne = $input['carne'];
            $usuario->email = $input['email'];
            $usuario->password = bcrypt($input['password']);
            $usuario->save();
            $msjExito = "Sus datos se han almacenado";
            return  view('pages.perfilUsuario', compact('usuario','errors','msjExito'));
        }

        
    }

    public function validarUpd($input){
        $id = Auth::user()->id;
        return Validator::make($input, [
            'nombreCompleto' => 'required|max:255',
            'carne' => 'required|max:6|min:6|unique:users,carne,'.$id,//validar esto
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',

        ]);
    }
}