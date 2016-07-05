<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Surveys</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url" content="{{$ruta}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$encuesta->titulo}}"/>
    <meta property="og:description" content="Ayudanos completando esta encuesta"/>
    @if(file_exists(public_path().'\encuestaImgs\\'.$encuesta->id .'.png'))
        <meta property="og:image"
              content="{{public_path().'\encuestaImgs\\'.$encuesta->id .'.png'}}"/>

    @else
    <meta property="og:image"
          content="http://previews.123rf.com/images/gigisomplak/gigisomplak1405/gigisomplak140500047/29198252-dibujo-dibujar-a-mano-la-nota-en-blanco-y-pluma-Foto-de-archivo.jpg"/>
    @endif



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="/js/jquery.sortable.js"></script>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">


</head>
<body>
<div class="container">
<div class="header">
    <img src="/imgs/logo1.png" alt="Logo" href="/"/>
</div>
@if($errors->any())
<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Oh un momento!</strong> Faltan preguntas por responder.
</div>
@endif
<div class="col-lg-offset-1 col-lg-10">
    <div class="row">
        <div class="well bs-component">
            <form method="post" action="/cuestionario/{{ $encuesta->id }}/cambiarPagina" id="encuestaNueva"
                  class="form-horizontal">
                <fieldset>
                    <legend><strong>{{ $encuesta->titulo }}</strong></legend>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                    <input type="hidden" name="current" value=""/>
                    <input type="hidden" name="currentPage" value="{{ $preguntas->currentPage() }}"
                           id="actual-page"/>
                    <input type="hidden" name="ruta" value="{{ $ruta }}"/>
                    <blockquote>
                        <p>{{ $encuesta->descripcion }}</p>
                    </blockquote>
                    <p class="text-danger"><strong>Las preguntas con * son obligatorias</strong></p>
                    <legend>Preguntas</legend>
                    <ul id="listaPreg" class="sortable list-group">
                        @foreach ($preguntas as $pregunta)
                        @if ($pregunta->idTipoPregunta === 1)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left"
                                       class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                        }}. {{ $pregunta->pregunta }}
                                    @if($pregunta->esObligatorio === 1)
                                        <strong class="text-danger"> *</strong>
                                    @endif
                                    </h4>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    <input type="text" class="form-control" name="pregunta{{ $pregunta->id }}"
                                           rows="3" id="texto" value="{{ Session::get('pregunta'.$pregunta->id) }}">
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 2)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left"
                                       class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                        }}. {{ $pregunta->pregunta }}@if($pregunta->esObligatorio === 1)
                                        <strong class="text-danger">*</strong>
                                        @endif
                                    </h4>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    <textarea class="form-control" name="pregunta{{ $pregunta->id }}" rows="3"
                                              id="textArea">{{ Session::get('pregunta'.$pregunta->id) }}</textarea>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 3)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left"
                                       class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                        }}. {{ $pregunta->pregunta }}@if($pregunta->esObligatorio === 1)
                                        <strong class="text-danger">*</strong>
                                        @endif
                                    </h4>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    @foreach ($pregunta->opciones as $opcion)
                                    <div class="col-lg-8">
                                        <div class="radio">
                                            <label>
                                                @if (Session::get('pregunta'.$pregunta->id) != null &&
                                                Session::get('pregunta'.$pregunta->id) === $opcion->opcion)
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"
                                                       id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}"
                                                       checked="true">
                                                {{ $opcion->opcion }}
                                                @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"
                                                       id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}">
                                                {{ $opcion->opcion }}
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 4)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left"
                                       class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                        }}. {{ $pregunta->pregunta }}@if($pregunta->esObligatorio === 1)
                                        <strong class="text-danger">*</strong>
                                        @endif
                                    </h4>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-10">
                                    @foreach ($pregunta->opciones as $opcion)
                                    <div class="col-lg-2">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null &&
                                            Session::get('pregunta'.$pregunta->id) === $opcion->opcion)
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"
                                                   style="margin-top: 10px;" checked="true"
                                                   value="{{ $opcion->opcion}}">
                                            {{ $opcion->posicion}}
                                            </br>
                                            <label>{{ $opcion->opcion }}</label>
                                            @else
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"
                                                   style="margin-top: 10px;" value="{{ $opcion->opcion}}">
                                            {{ $opcion->posicion}}
                                            </br>
                                            <label>{{ $opcion->opcion }}</label>
                                            @endif
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 5)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left"
                                       class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                        }}. {{ $pregunta->pregunta }}
                                        @if($pregunta->esObligatorio === 1)
                                        <strong class="text-danger">*</strong>
                                        @endif
                                    </h4>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    @foreach ($pregunta->opciones as $opcion)
                                    <div class="col-lg-8">
                                        <div class="radio">
                                            <label>
                                                @if (Session::get('pregunta'.$pregunta->id) != null)
                                                    <input type="checkbox" name="pregunta{{ $pregunta->id }}[]"
                                                           id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}"

                                                        @foreach (Session::get('pregunta'.$pregunta->id) as $sesion)
                                                            @if ($sesion === $opcion->opcion)
                                                               checked="true"
                                                            @endif
                                                        @endforeach
                                                        >
                                                    {{ $opcion->opcion }}
                                                @else
                                                    <input type="checkbox" name="pregunta{{ $pregunta->id }}[]"
                                                           id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}">
                                                    {{ $opcion->opcion }}
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="form-group">
                        <div>
                            <ul class="pager" style="cursor: pointer;">
                                @if ($preguntas->currentPage() === 1)
                                <li class="disabled"><a onclick="cambiarPag(1)"><h5><strong>Anterior</strong></h5>
                                    </a></li>
                                @else
                                <li><a onclick="cambiarPag(1)"><h5><strong>Anterior</strong></h5></a></li>
                                @endif
                                @if ($preguntas->currentPage() === $preguntas->lastPage())
                                <li><a onclick="cambiarPag(3)" id="end-survey"><h5><strong>Enviar Encuesta</strong>
                                        </h5></a></li>
                                @else
                                <li><a onclick="cambiarPag(2)" id="next-page"><h5><strong>Siguiente</strong></h5>
                                    </a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </fieldset>
            </form>
            <input type="hidden" value="{{$preguntas->lastPage()}}" id="lastPage">
        </div>
    </div>
</div>
<script type="text/javascript">
    function cambiarPag(num) {
        $(document.getElementsByName('current')).val(num);
        $(document.getElementById('encuestaNueva')).submit();
    }

    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {


                var pagina = parseInt(document.getElementById("actual-page").value);
                // var num = 2;
                var ultimo = parseInt(document.getElementById("lastPage").value);

                if (pagina == ultimo) {
                    //num = 3;
                    $("#end-survey").click();
                } else {

                    $("#next-page").click();
                }
                $(document.getElementsByName('current')).val(num);
                $(document.getElementById('encuestaNueva')).submit();
            }
        });
    });


</script>
</div>
</body>
</html>








