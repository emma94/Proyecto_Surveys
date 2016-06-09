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
            return view('pages.cuestionario', compact('encuesta', 'preguntas'))->with('page', '1');
        } else {
            return redirect('/');
        }
    }

    public function cambiarPagina(Request $request, $preguntas) {
        Session::put(Request::all());

        return back()->with('page', $request->input('page'));
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
