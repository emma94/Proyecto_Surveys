<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use App\User;
use Crypt;

use App\Http;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class EnvioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function verPagEnvio(Request $request){
        $encuesta = App\Encuesta::find($request->id);
        $nombre = $encuesta->titulo;
        $hashi = new Hashids();
        $codigo = $hashi->encode($encuesta->id);
        $servidor = $request->root();
        $link = $servidor ."/cuestionario/" .$codigo;
        return view('pages.enviarEncuesta', compact('link','nombre'));
    }


    public function enviarCorreos(Request $request){
        dd($request);
    }

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




}