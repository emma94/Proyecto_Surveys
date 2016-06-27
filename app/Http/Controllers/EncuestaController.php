<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use App\Pregunta;
use App\Tag;
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

    public function crearNuevaEncuestaPage() {
      /*  $encuesta = new App\Encuesta;
        $encuesta->idUsuario = \Auth::user()->id;
        $encuesta->idEstado = 1;
        $encuesta->titulo = '';
        $encuesta->save();

        return redirect()->to("/crearEncuesta?id=$encuesta->id");*/
        $tags = App\Tag::all();
        return view("pages.crearNuevaEncuesta",compact('tags'));
    }

    public function crearEncuesta(Request $request){
        $encuesta = new App\Encuesta;
        $encuesta->idUsuario = \Auth::user()->id;
        $encuesta->idEstado = 1;
        $encuesta->titulo = $request['titulo'];
        $encuesta->descripcion = $request['descripcion'];
        $listaTag = $request['tags'];
        $encuesta->save();
        $encuesta->tags()->attach($listaTag); //detach(); para eliminar todos--- detach(id); para eliminar con el id especifico
        
        return redirect()->to("/crearEncuesta?id=$encuesta->id");
    }

    public function verCrearEncuesta(Request $request) {
        $encuesta = App\Encuesta::find($request->id);
        $tags = App\Tag::all();
       
    if  ($encuesta->idUsuario == \Auth::user()->id) {
        return view("pages.crearEncuesta", compact('encuesta','tags'));
    }
       return redirect()->to('/');
    }

    public function store(Request $request, Encuesta $encuesta) {
        $preg = new App\Pregunta;
        $preg->idTipoPregunta = $request->tipo;
        if ($preg->idTipoPregunta == '3') {
            $preg->idTipoGrafico = 1;
        } elseif ($preg->idTipoPregunta == '4') {
            $preg->idTipoGrafico = 2;
        } else {
            $preg->idTipoGrafico = 3;
        }

        $preg->posicion = $encuesta->preguntas()->count() + 1;
        $preg->pregunta = '';
        $encuesta->preguntas()->save($preg);
        if ($preg->idTipoPregunta == 3 || $preg->idTipoPregunta == 5) {
            $opcion = new App\Opciones;
            $opcion->opcion = '';
            $opcion->posicion = 1;
            $preg->opciones()->save($opcion);
        }
        if ($preg->idTipoPregunta == 4) {
            for($i = 1; $i <= 5; $i++) {
                $opcion = new App\Opciones;
                $opcion->opcion = '';
                $opcion->posicion = $i;
                $preg->opciones()->save($opcion);
            }
        }


        return back();
    }

    public function agregarPregunta($tipo, Encuesta $encuesta) {
        $preg = new App\Pregunta;
        $preg->idTipoPregunta = $tipo;
        $preg->idTipoGrafico = 1;
        $preg->posicion = $encuesta->preguntas()->count() + 1;
        $preg->pregunta = '';
        $encuesta->preguntas()->save($preg);
        if ($preg->idTipoPregunta == 3 || $preg->idTipoPregunta == 5) {
            $opcion = new App\Opciones;
            $opcion->opcion = '';
            $opcion->posicion = 1;
            $preg->opciones()->save($opcion);
        }
        if ($preg->idTipoPregunta == 4) {
            for($i = 1; $i <= 5; $i++) {
                $opcion = new App\Opciones;
                $opcion->opcion = '';
                $opcion->posicion = $i;
                $preg->opciones()->save($opcion);
            }
        }
        
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
        if ($preg->idTipoPregunta == 3 or $preg->idTipoPregunta == 4) {
            $preg->opciones()->delete();
        }
        $preg->delete();

        return back();
    }

    public function guardarOpciones($id){
        $preg = App\Pregunta::find($id);
        $opcion = new App\Opciones;
        $opcion->opcion = '';
        $opcion->posicion = $preg->opciones()->count() + 1;
        $preg->opciones()->save($opcion);
    }

    public function saveEncuesta(Request $request, Encuesta $encuesta) {
        $comp = true;
        $tipo = $request["tipoPregunta"];
        $idOp = $request["opcionIdP"];
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
            if ($preg->idTipoPregunta == 3 or $preg->idTipoPregunta == 5) {
                foreach ($preg->opciones as $opc) {
                    if ($opc->opcion != $request->input('opcion' . $opc->id)) {
                        $opc->opcion = $request->input('opcion' . $opc->id);
                        $opc->update();
                        $comp = false;
                    }
                }
            }
            if ($preg->idTipoPregunta == 4) {
                $n = 1;
                foreach ($preg->opciones as $opc) {
                    if ($opc->opcion != $request->input('descripcion' . $n)) {
                        $opc->opcion = $request->input('descripcion' . $n);
                        $opc->update();
                        $comp = false;
                    }
                    $n++;
                }
            }
        }
        $listaTag = $request['tags'];
        if ($comp == false) {
            $encuesta->update();
        }
        $encuesta->tags()->sync($listaTag);
        if ($tipo > 0){
            $this->agregarPregunta($tipo,$encuesta);
        }
        if ($idOp > 0) {
            $this->guardarOpciones($idOp);
        }
        return back();
    }



    public function cambiarEstado(Encuesta $encuesta) {
        if ($encuesta->idEstado == 1) {
            $encuesta->idEstado = 2;
        } elseif ($encuesta->idEstado == 2) {
            $encuesta->idEstado = 3;
        }
        $encuesta->update();

        return redirect()->to("/miPerfil#encuestas");
        //return back();
    }

    public function verResultados(Encuesta $encuesta) {
        $preguntas = $encuesta->preguntas()->orderby('posicion')->paginate(5);
        return view("pages.resultados",compact('preguntas', 'encuesta'));
    }


    public function verCuestionarios(Request $req) {
        $encuesta = App\Encuesta::find($req->id);
        $preguntas = $encuesta->preguntas()->orderby('posicion')->paginate(5);

        if  ($encuesta->idUsuario == \Auth::user()->id) {
            return view("pages.imprimir", compact('encuesta', 'preguntas'));
        }
        return redirect()->to('/');
    }


    public function cambiarTipoGrafico(Pregunta $pregunta, Request $request) {
        $pregunta->idTipoGrafico = (int) $request->input('tipoGrafico');
        $pregunta->update();
        return back();
    }

    public function cambiarPagina(Encuesta $encuesta, Request $request) {
        $page = $request->input('currentPage');
        $tipo = $request->input('tipo');
        if($tipo == 1) {
            return redirect('resultados/'.$encuesta->id.'?page='.($page-1));
        } else {
            return redirect('resultados/'.$encuesta->id.'?page='.($page+1));
        }
    }
}

