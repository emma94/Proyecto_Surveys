<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CuestionarioController extends Controller
{
    //
    public function verCuestionario(Request $request){
        $ruta = $request->segment(2);
        $hashi = new Hashids();
        $id = $hashi->decode($ruta);
        $encuesta = App\Encuesta::find((int)$id[0]);
        $preguntas = $encuesta->preguntas()->orderby('posicion')->paginate(3);
        if($encuesta->idEstado == 2) {
            return view('pages.cuestionario', compact('encuesta', 'preguntas'));
        } else {
            return redirect('/');
        }
    }

    public function cambiarPagina(Request $request) {
        Session::put($request::all());
        return back();
    }

    public function guardarResultado(Encuesta $encuesta) {
        $resultado = new App\Resultado;
        $resultado->idEncuesta = $encuesta->id;
        $resultado->save();

        foreach ($encuesta->preguntas as $preg) {
            $res = new App\RespuestaEncuesta;
            $res->idResultado = $resultado->id;
            $res->idPregunta = $preg->id;
            $res->respuesta = Session('pregunta' . $preg->id);
            $res->save();
        }

        return redirect('/');
    }
}
