<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Hash;
use Request;

class EncuestaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function verCrearEncuesta() {
        return view("pages.crearEncuesta");
    }
   
}