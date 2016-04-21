<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function inicio() {
        return view("inicio");
    }

    public function acerca() {
        return view("pages.acerca");
    }

    public function iniciarSesion() {
        return view("pages.iniciarSesion");
    }
}
