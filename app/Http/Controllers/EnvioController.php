<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnvioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crearNuevaEncuesta() {
        $encuesta = new App\Encuesta;
        $encuesta->idUsuario = 1;
        $encuesta->idEstado = 1;
        $encuesta->titulo = 'Sin Titulo';
        $encuesta->save();

        return redirect()->to("/crearEncuesta");
    }

    public function verCrearEncuesta() {

        $encuesta = App\Encuesta::find(1);

        return view("pages.crearEncuesta", compact('encuesta'));
    }

    public function store(Request $request, Encuesta $encuesta) {
        $preg = new App\Pregunta;
        $preg->idTipoPregunta = $request->tipo;
        $preg->idTipoGrafico = 1;
        $preg->pregunta = 'Sin redactar';
        $encuesta->preguntas()->save($preg);

        return back();
    }
    
    
    public function verPagEnvio(){
        //obtener el link de la enceusta
        $nombre = "el nombre de la enceusta";
        $link = "http://www.localhost/enviarEncuesta";
        return view('pages.enviarEncuesta', compact('link','nombre'));
    }

}