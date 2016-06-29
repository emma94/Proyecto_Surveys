<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BuscarController extends Controller
{
    public function buscar(Request $request)
    {
        $valor = $request["valor"];
        $encuestasFull = Encuesta::with('tags')->whereHas('tags',function($q) use ($valor){
           $q->where('nombre', 'LIKE', '%' . $valor . '%');
        })->where('titulo', 'LIKE', '%' . $valor . '%')->where('idEstado','=',3)->get();
       // $ids = "";
        $listaId = array();
        foreach ($encuestasFull as $item){
            array_push($listaId,$item->id);
         //   $ids = $ids ."" .$item->id .", ";
        }
       // $ids = substr($ids,0,-2);
        $encuestasTitulo = Encuesta::with('tags')->where('titulo', 'LIKE', '%' . $valor . '%')->whereNotIn('id',$listaId)->where('idEstado','=',3)->get();//where('id', 'NOT IN', ' (' . $ids . ')')->get();
        $encuestaTags = Encuesta::with('tags')->whereHas('tags',function($q) use ($valor){
            $q->where('nombre', 'LIKE', '%' . $valor . '%');
        })->whereNotIn('id',$listaId)->where('idEstado','=',3)->get();
        foreach ($encuestasTitulo as $item){
            $encuestasFull->push($item);
        }
        foreach ($encuestaTags as $item){
            $encuestasFull->push($item);
        }
        $encuestas = $encuestasFull;
        //dd($encuestasFull,$encuestasTitulo,$encuestaTags);
/*
        //$encuestasTit = Encuesta::with('tags')->where('titulo', 'LIKE', '%' . $valor . '%')->get();
        //$encuestasTit = Encuesta::where('titulo', 'LIKE', '%' . $valor . '%')->get();
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
        }*/
        $de="";
        $hasta= "";
        $titulo = "";
        $catego = array();
        $tags = App\Tag::all();
        return view('pages.resultadoBusqueda', compact('encuestas', 'titulo', 'catego', 'tags','de','hasta'));

        //dd($valor,$encuestasTitulo, $encuestasTag,$encuestas);
    }


    public function verEncuesta(Encuesta $encuesta){
        $preguntas = $encuesta->preguntas()->orderby('posicion')->paginate(5);
        return view("pages.resultadosBusquedaEncuesta", compact('preguntas', 'encuesta'));
    }

    public function cambiarTipoGrafico(Pregunta $pregunta, Request $request)
    {
        $pregunta->idTipoGrafico = (int)$request->input('tipoGrafico');
        //$pregunta->update();
        return back();
    }

    public function cambiarPagina(Encuesta $encuesta, Request $request)
    {
        $page = $request->input('currentPage');
        $tipo = $request->input('tipo');
        if ($tipo == 1) {
            return redirect('resultados/' . $encuesta->id . '?page=' . ($page - 1));
        } else {
            return redirect('resultados/' . $encuesta->id . '?page=' . ($page + 1));
        }
    }

    public function busquedaAvanzada(Request $request){
        $titulo = $request['titulo'] . "";
        $catego = $request['tags'];
        $de = $request['añoDe'] ."";
        $hasta = $request['añoHasta'] ."";
        $tags = App\Tag::all();
        $cantidad = count($catego);
        $sinCat = false;
        if ($catego == null){
            $catego = [];
            $sinCat = true;

        }
        $cambiarDe = false;
        $cambiarHas = false;
        if (strlen($de) == 0) {
            $de = 0;
            $cambiarDe = true;
        }
        if (strlen($hasta) == 0) {
            $hasta = date('Y') + 1;
            $cambiarHas = true;
        }
        /*$encuestas = Encuesta::with('tags')->whereHas('tags',function($q) use ($catego ){
            foreach ($catego as $item){
                $q->where('tags.id', '=', $item);
            }
            //$q->whereIn('tags.id', $catego);
        })->where('titulo', 'LIKE', '%' . $titulo . '%')->toSql();*/
        $lista ="";
        foreach ($catego as $item){
            $lista = $lista. '' .$item . ', ';
        }
        $lista = substr($lista,0,-2);
        $encuestas = null;

        if ($sinCat == false) {
            $resultado = DB::select("select *
            from  encuestas e 
            inner join encuesta_tag et 
            on e.id = et.encuesta_id
             where e.titulo LIKE '%" . $titulo . "%' AND e.idEstado = 3 AND et.tag_id in (" . $lista . ")
             group by e.id
              having count(distinct et.tag_id) = " . $cantidad);
            $ids = array();

            foreach ($resultado as $item) {
                $en = json_decode(json_encode($item), True);
                array_push($ids, $en['encuesta_id']);
            }
            /*  $idss = array();
              foreach ($ids as $id){
                  array_push($idss,$id[0]);
              }*/

            $encuestas = Encuesta::with('tags')->whereIn('id', $ids)->where('idEstado', '=', 3)->whereBetween('añoTerminado', [$de, $hasta])->get();
        } else{
            $encuestas = Encuesta::with('tags')->where('titulo', 'LIKE', '%' . $titulo . '%')->where('idEstado', '=', 3)->whereBetween('añoTerminado', [$de, $hasta])->get();
        }
//        dd($resultado,$encuestas,$ids);
        if ($cambiarDe) {
            $de="";
        }
        if ($cambiarHas){
            $hasta = "";
        }
        return view('pages.resultadoBusqueda', compact('encuestas', 'titulo', 'catego', 'tags','de','hasta'));
    }
}