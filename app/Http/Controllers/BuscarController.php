<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class BuscarController extends Controller
{
    public function buscar(Request $request)
    {
        $valor = $request["valor"];
        $encuestasTit = Encuesta::where('titulo', 'LIKE', '%' . $valor . '%')->get();
        $resultadoTag = App\Tag::where('nombre', 'LIKE', '%' . $valor . '%')->get();
        $encuestasTag = array();
        foreach ($resultadoTag as $tag) {
            foreach ($tag->encuestas as $enc) {
                $enc->tags;
                $enc = $enc->toArray();
                unset($enc['pivot']);
                array_push($encuestasTag, $enc);
            }
        }

        $encuestasTitulo = array();
        foreach ($encuestasTit as $enc) {
            $enc->tags;
            array_push($encuestasTitulo, $enc->toArray());
        }
        $encuestas = array();
        foreach ($encuestasTitulo as $enc) {
            foreach ($encuestasTag as $encTag) {
                if ($enc['id'] == $encTag['id']) {
                    array_push($encuestas, $enc);
                }
            }
        }

        foreach ($encuestasTitulo as $encTag) {
            if (!in_array($encTag, $encuestas)) {
                array_push($encuestas, $encTag);
            }
        }
        foreach ($encuestasTag as $encTag) {
            if (!in_array($encTag, $encuestas)) {
                array_push($encuestas, $encTag);
            }
        }
        $titulo = "";
        $catego = array();
        $tags = App\Tag::all();
        return view('pages.resultadoBusqueda', compact('encuestas', 'titulo', 'catego', 'tags'));

        //dd($valor,$encuestasTitulo, $encuestasTag,$encuestas);
    }
}