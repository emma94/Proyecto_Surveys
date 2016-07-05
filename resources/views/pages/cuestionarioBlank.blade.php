<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Surveys</title>

    <link rel="stylesheet" href="/css/print.css" media="print">
</head>

<body>
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div>
                <fieldset>
                    <legend style="text-align: center"><strong>{{ $encuesta->titulo }}</strong></legend>
                    <blockquote>
                        <p>{{ $encuesta->descripcion }}</p>
                    </blockquote>
                    <hr/>
                    <ul id="listaPregImp" class="" style="list-style: none;">
                        @foreach ($encuesta->preguntas as $pregunta)
                        @if ($pregunta->idTipoPregunta === 1)
                        <li class="list-group-item">

                            <label for="pregunta" style="text-align: left"
                                   class=""><h4>{{ $pregunta->posicion
                                    }}. {{ $pregunta->pregunta }}</h4></label>

                            <div class="">
                                <input type="text" class="form-control" name="pregunta{{ $pregunta->id }}"
                                       rows="3" id="texto" value="{{ Session::get('pregunta'.$pregunta->id) }}">
                            </div>

                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 2)
                        <li class="">

                            <label for="pregunta" style="text-align: left"
                                   class=""><h4>{{ $pregunta->posicion
                                    }}. {{ $pregunta->pregunta }}</h4></label>

                            <div class="">
                                <textarea class="form-control" name="pregunta{{ $pregunta->id }}" rows="3" cols="80"
                                          id="textArea">{{ Session::get('pregunta'.$pregunta->id) }} </textarea>
                            </div>

                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 3)
                        <li class="">

                            <label for="pregunta" style="text-align: left"
                                   class=""><h4>{{ $pregunta->posicion
                                    }}. {{ $pregunta->pregunta }}</h4></label>


                            <div class="">
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

                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 4)
                        <li class="list-group-item">

                            <label for="pregunta" style="text-align: left"
                                   class=""><h4>{{ $pregunta->posicion
                                    }}. {{ $pregunta->pregunta }}</h4></label>


                            <div class="">
                                @foreach ($pregunta->opciones as $opcion)
                                <div class="tipoEscalaImprimir">
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
                                    <br>
                                </div>
                                @endforeach
                            </div>

                        </li>
                        <br>
                        @endif
                        @if ($pregunta->idTipoPregunta === 5)
                        <li class="list-group-item">

                            <label for="pregunta" style="text-align: left"
                                   class=""><h4>{{ $pregunta->posicion
                                    }}. {{ $pregunta->pregunta }}</h4></label>


                            <div class="">
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
                        </li>
                        @endif
                        <br>
                        @endforeach
                    </ul>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = window.print();
</script>
</body>
</html>