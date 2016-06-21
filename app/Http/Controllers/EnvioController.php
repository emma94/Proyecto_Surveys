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
use Mail;
use Redirect;


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
        $input = $request->all();
        $id = $input["id"];
        $encuesta = App\Encuesta::find($id);
        $titulo = $encuesta->titulo;
        $link = $input["link"];
        $lista = $input["correo"];
        $asunto = $input["asunto"];
        $msj = $input["mensaje"];
        if (strlen($asunto) < 1) {
            $asunto = "Ayudanos a contestar esta encuesta";
        }
        if (strlen($msj) < 1) {
            $msj = "Ayudanos a contestar esta encuesta sobre " .$titulo ." ingresando al siguiente link:";
        } else {
            $msj = $msj ."\r\n\r\nLink de la encuesta:";
        }
        Mail::send('pages.emails.enviarLink', ['link' => $link, 'msj' => $msj ], function($message) use ($lista,$asunto)
        {
            $message->to($lista)->subject($asunto);
        });
        $fallos = Mail:: failures();
        $tabFace = "";
        $tabMail = "active";

        return back()->with('message', 'Correos enviados');

    }




}