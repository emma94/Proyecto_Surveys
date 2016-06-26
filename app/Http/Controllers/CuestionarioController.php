<?php

namespace App\Http\Controllers;

use App;
use App\Encuesta;
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
        $preguntas = $encuesta->preguntas()->orderby('posicion')->paginate(5);
        if($encuesta->idEstado == 2) {
            return view('pages.cuestionario', compact('encuesta', 'preguntas', 'ruta'))->with('page', '1');
        } else {
            return redirect('/');
        }
    }

    public function cambiarPagina(Request $request, Encuesta $encuesta) {
        Session::put($request->all());
        $page = 0;

        if ($request->input('current') == '3') {
            $resultado = new App\Resultado;
            $resultado->idEncuesta = $encuesta->id;
            $resultado->save();

            foreach ($encuesta->preguntas as $preg) {
                if ($preg->idTipoPregunta == 5) {
                    foreach (Session('pregunta' . $preg->id) as $cb) {
                        $res = new App\RespuestaEncuesta;
                        $res->idResultado = $resultado->id;
                        $res->idPregunta = $preg->id;
                        $res->respuesta = $cb;
                        $res->save();    
                    }
                } else {
                    $res = new App\RespuestaEncuesta;
                    $res->idResultado = $resultado->id;
                    $res->idPregunta = $preg->id;
                    $res->respuesta = Session('pregunta' . $preg->id);
                    $res->save();
                }
            }
            Session::flush();

            return redirect('/');
        }
        if ($request->input('current') == '1') {
            $page = $request->input('currentPage')-1;
        } else {
            $page = $request->input('currentPage')+1;
        }
        return redirect('/cuestionario/'.$request->input('ruta').'?page='.$page);
    }
}
