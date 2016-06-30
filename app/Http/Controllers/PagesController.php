<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function inicio()
    {
        return view("inicio");
    }

    public function algo()
    {
        return view("home");
    }

    public function iniciarSesion()
    {
        return view("pages.iniciarSesion");
    }


    public function verPerfil()
    {
        return view("pages.perfilUsuario");
    }
}
