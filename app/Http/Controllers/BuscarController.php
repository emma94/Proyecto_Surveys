<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class BuscarController extends Controller
{
    public function buscar(Request $request){
        $valor = $request["valor"];
        $encuestasTitulo = Encuesta::where('titulo', 'LIKE', '%' .$valor . '%')->get();
        $resultadoTag = App\Tag::where('nombre', 'LIKE', '%' .$valor . '%')->get();
        $encuestasTag = array();
        foreach ($resultadoTag as $tag) {
            if (count($tag->encuestas) > 0) {
                array_push($encuestasTag,$tag->encuestas);
            }
        }
        dd($valor,$encuestasTitulo, $resultadoTag, $encuestasTag);
    }
}