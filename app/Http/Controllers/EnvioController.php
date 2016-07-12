<?php namespace App\Http\Controllers;

use App;
use App\Encuesta;
use App\User;
use Crypt;
use Mockery\CountValidator\Exception;
use Validator;
use App\Http;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Mail;
use Redirect;
use Intervention\Image\Facades\Image as Image;


class EnvioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function verPagEnvio(Request $request)
    {
        $encuesta = App\Encuesta::find($request->id);
        if ($encuesta->idEstado == 2) {
            $nombre = $encuesta->titulo;
            $hashi = new Hashids();
            $codigo = $hashi->encode($encuesta->id);
            $servidor = $request->root();
            $link = $servidor . "/cuestionario/" . $codigo;
            $infoImg = "No se ha seleccionado una imagen";
            $id = $encuesta->id;
            if(file_exists(public_path().'\encuestaImgs\\'.$encuesta->id .'.jpg')){
                return view('pages.enviarEncuesta', compact('link', 'nombre','infoImg','id'))->with('messageImg', 'Imagen subida');
            }
            return view('pages.enviarEncuesta', compact('link', 'nombre','infoImg','id'));
        }else {
            return back();
        }
    }


    public function enviarCorreos(Request $request)
    {
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
            $msj = "Ayudanos a contestar esta encuesta sobre " . $titulo . " ingresando al siguiente link:";
        } else {
            $msj = $msj . "\r\n\r\nLink de la encuesta:";
        }
        Mail::send('pages.emails.enviarLink', ['link' => $link, 'msj' => $msj], function ($message) use ($lista, $asunto) {
            $message->bcc($lista)->subject($asunto);
        });
        $fallos = Mail:: failures();
        $tabFace = "";
        $tabMail = "active";

        return back()->with('message', 'Correos enviados');

    }

    public function subirImagen(Request $request){
        $file = $request->file('imagen');
        $vari = $this->validarUpd(array('imagen' => $file));

        if (!$this->validarUpd(array('imagen' => $file))->fails()) {
            try {
                $id = $request['id'];
                $image = Image::make($request->file('imagen'))->encode('jpg');
                $image->resize(1200, 630);
                $path = public_path() . '/encuestaImgs/';
                $image->save($path . "" . $id . ".jpg");
                return back()->with('messageImg', 'Imagen subida');
            } catch (Exception $ex) {
                return back()->with('messageImg', 'No se logro subir la imagen. Asegurese de que el formato sea correcto y que cumple con el tamaño mínimo solicitado');

            }
        } else {
            return back()->with('messageImg', 'No se logro subir la imagen. Asegurese de que el formato sea correcto y que cumple con el tamaño mínimo solicitado');
        }

    }

    public function validarUpd($input)
    {
        return Validator::make($input, [
           'imagen' => 'dimensions:min_width=1200,min_height=630|mimes:jpeg,png'
        ]);
    }


}