<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use App\User;
use Crypt;

use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;



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

        $correos = array();
        array_push($correos,'manaaaaaaaaaaaaaaaaaazana','papayaaaaaaaaaaaaaaaaaadsadasdasdasdaaddsa','melonaaaaaaaaaaaaaaaaa');
       return view('pages.enviarEncuesta', compact('link','nombre','correos'));
    }

    public function verCuestionario(Request $request){
        $ruta = $request->segment(2);
        $hashi = new Hashids();
        $id = $hashi->decode($ruta);
        dd($ruta,$id[0]);
    }



}