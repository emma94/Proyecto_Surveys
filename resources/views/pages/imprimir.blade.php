<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Surveys</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">


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
    <link rel="stylesheet" type="text/css" href="/css/print.css" media="print">


</head>

<body>
<div class="container">
    <div class="header">
        <img src="/imgs/logo1.png" alt="Logo" href="/"/>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div >
                <form method="post" id="encuestaNueva" class="form-horizontal">
                    <fieldset>
                        @foreach ($encuesta->resultados as $resultado)
                        <legend style="text-align: center"><strong>{{ $encuesta->titulo }}</strong></legend>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                        <blockquote>
                            <p>{{ $encuesta->descripcion }}</p>
                        </blockquote>
                        <hr/>
                        <ul id="listaPreg" class="sortable list-group">
                            @foreach ($encuesta->preguntas as $pregunta)
                            @if ($pregunta->idTipoPregunta === 1)
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="pregunta" style="text-align: left"
                                           class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                            }}. {{ $pregunta->pregunta }}</h4></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-9">
                                        <label for="pregunta" style="text-align: justify"
                                               class="col-lg-offset-1 col-lg-11 control-label"><h5></h5></label>
                                        <!--<input type="text" class="form-control" name="pregunta{{ $pregunta->id }}"
                                               rows="3" id="texto" value="3333">-->
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if ($pregunta->idTipoPregunta === 2)
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="pregunta" style="text-align: left"
                                           class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                            }}. {{ $pregunta->pregunta }}</h4></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-9">
                                        <label for="pregunta" style="text-align: justify"
                                               class="col-lg-offset-1 col-lg-11 control-label"><h5></h5></label>
                                        <!--<textarea class="form-control" name="pregunta{{ $pregunta->id }}" rows="3"
                                                  id="textArea">{{ Session::get('pregunta'.$pregunta->id) }}</textarea>-->
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if ($pregunta->idTipoPregunta === 3)
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="pregunta" style="text-align: left"
                                           class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion
                                            }}. {{ $pregunta->pregunta }}</h4></label>
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
                                                           checked="">
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
                                            }}. {{ $pregunta->pregunta }}</h4></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-10">
                                        @foreach ($pregunta->opciones as $opcion)
                                        <div class="col-lg-2">
                                            <label>
                                                @if (Session::get('pregunta'.$pregunta->id) != null &&
                                                Session::get('pregunta'.$pregunta->id) === $opcion->posicion)
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"
                                                       style="margin-top: 10px;" checked=""
                                                       value="{{ $opcion->posicion}}">
                                                {{ $opcion->posicion}}
                                                </br>
                                                <label>{{ $opcion->opcion }}</label>
                                                @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"
                                                       style="margin-top: 10px;" value="{{ $opcion->posicion}}">
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
                                            }}. {{ $pregunta->pregunta }}</h4></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-9">
                                        @foreach ($pregunta->opciones as $opcion)
                                        <div class="col-lg-8">
                                            <div class="radio">
                                                <label>
                                                    @if (Session::get('pregunta'.$pregunta->id) != null &&
                                                    Session::get('pregunta'.$pregunta->id) === $opcion->opcion)
                                                    <input type="checkbox" name="pregunta{{ $pregunta->id }}[]"
                                                           id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}"
                                                           checked="">
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
                            <hr/>
                            <br>
                            @endforeach
                        </ul>
                        @endforeach
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>