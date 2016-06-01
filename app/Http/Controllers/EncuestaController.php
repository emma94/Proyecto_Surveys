<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EncuestaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crearNuevaEncuesta() {
        $encuesta = new App\Encuesta;
        $encuesta->idUsuario = \Auth::user()->id;
        $encuesta->idEstado = 1;
        $encuesta->titulo = '';
        $encuesta->save();

        return redirect()->to("/crearEncuesta?id=$encuesta->id");
    }

    public function verCrearEncuesta(Request $request) {
    $encuesta = App\Encuesta::find($request->id);
    if  ($encuesta->idUsuario == \Auth::user()->id) {
        return view("pages.crearEncuesta", compact('encuesta'));
    }
       return redirect()->to('/');
    }

    public function store(Request $request, Encuesta $encuesta) {
        $preg = new App\Pregunta;
        $preg->idTipoPregunta = $request->tipo;
        $preg->idTipoGrafico = 1;
        $preg->posicion = $encuesta->preguntas()->count() + 1;
        $preg->pregunta = '';
        $encuesta->preguntas()->save($preg);
        if ($preg->idTipoPregunta == 3) {
            $opcion = new App\Opciones;
            $opcion->opcion = '';
            $opcion->posicion = 1;
            $preg->opciones()->save($opcion);
        }

        return back();
    }

    public function storeOpciones(Request $request) {
        $preg = App\Pregunta::find($request->id);
        $opcion = new App\Opciones;
        $opcion->opcion = '';
        $opcion->posicion = $preg->opciones()->count() + 1;
        $preg->opciones()->save($opcion);

        return back();
    }
    public function deletePregunta(Request $request) {
        $preg = App\Pregunta::find($request->idP);
        if ($preg->idTipoPregunta == 3) {
            $preg->opciones()->delete();
        }
        $preg->delete();

        return back();
    }

    public function saveEncuesta(Request $request, Encuesta $encuesta) {
        $comp = true;
        if ($encuesta->titulo != $request->titulo) {
            $encuesta->titulo = $request->titulo;
            $comp = false;
        }
        if ($encuesta->descripcion != $request->descripcion) {
            $encuesta->descripcion = $request->descripcion;
            $comp = false;
        }

        foreach ($encuesta->preguntas as $preg) {
            if ($preg->pregunta != $request->input(''+$preg->id)) {
                $preg->pregunta = $request->input(''+$preg->id);
                $preg->update();
                $comp = false;
            }
            if (((int)$request->input('posPregunta' . $preg->id)) != $preg->posicion) {
                $preg->posicion = ((int)$request->input('posPregunta' . $preg->id));
                $preg->update();
            }
            if ($preg->idTipoPregunta = 3) {
                foreach ($preg->opciones as $opc) {
                    if ($opc->opcion != $request->input('opcion' . $opc->id)) {
                        $opc->opcion = $request->input('opcion' . $opc->id);
                        $opc->update();
                        $comp = false;
                    }
                }
            }
        }
        if ($comp == false) {
            $encuesta->update();
        }

        return back();
    }
}