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
                        <?php $ind = 1; ?>
                        @foreach ($encuesta->resultados as $resultado)
                            <br>
                            @if($ind > 1)
                        <div class="page-break" style="page-break-after: always;"></div>
                            @endif
                            <fieldset>
                        <legend style="text-align: center"><strong>Cuestionario #{{$ind . ":  "}}{{ $encuesta->titulo }}</strong></legend>
                                <?php $ind = $ind + 1; ?>
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
                                        <label for="pregunta" style="text-align: justify" class="multilinea"
                                               class=""><p>
                                                {{$resultado->respuestas()->get()->
                                                where('idResultado', $resultado->id)->where('idPregunta',
                                                $pregunta->id)->first()->respuesta}}</p></label>
                                    </div>

                            </li>
                            @endif
                            @if ($pregunta->idTipoPregunta === 2)
                            <li class="">

                                    <label for="pregunta" style="text-align: left"
                                           class=""><h4>{{ $pregunta->posicion
                                            }}. {{ $pregunta->pregunta }}</h4></label>



                                    <div class="">
                                        <label for="pregunta" style="text-align: justify" class="multilinea"
                                               class=""><p>
                                                {{$resultado->respuestas()->get()->
                                                where('idResultado', $resultado->id)->where('idPregunta',
                                                $pregunta->id)->first()->respuesta}}</p></label>
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
                                        <div class="">
                                            <div class="radio">
                                                <label>
                                                    @if ($resultado->respuestas()->get()->
                                                    where('idResultado', $resultado->id)->where('idPregunta',
                                                    $pregunta->id)->first()->respuesta === $opcion->opcion)
                                                    <input type="radio" name="{{$resultado->id}}pregunta{{ $pregunta->id }}"
                                                           id="{{$resultado->id}}opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}"
                                                           checked="true" onclick="return false" onkeydown="return false">
                                                    {{ $opcion->opcion }}
                                                    @else
                                                    <input type="radio" name="{{$resultado->id}}pregunta{{ $pregunta->id }}"
                                                           id="{{$resultado->id}}opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}"
                                                           onclick="return false" onkeydown="return false">
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

                                            <label >
                                                @if ($resultado->respuestas()->get()->
                                                where('idResultado', $resultado->id)->where('idPregunta',
                                                $pregunta->id)->first()->respuesta === $opcion->opcion)
                                                <input type="radio" name="{{$resultado->id}}pregunta{{ $pregunta->id }}"
                                                       style="margin-top: 10px;" checked=""
                                                       value="{{ $opcion->posicion}}" onclick="return false" onkeydown="return false">
                                                {{ $opcion->posicion}}
                                                </br>
                                                <label>{{ $opcion->opcion }}</label>
                                                @else
                                                <input type="radio" name="{{$resultado->id}}pregunta{{ $pregunta->id }}"
                                                       style="margin-top: 10px;" value="{{ $opcion->posicion}}" onclick="return false" onkeydown="return false">
                                                {{ $opcion->posicion}}
                                                </br>
                                                <label>{{ $opcion->opcion }}</label>
                                                @endif
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                            </li>
                            @endif
                            @if ($pregunta->idTipoPregunta === 5)
                            <li class="list-group-item">

                                    <label for="pregunta" style="text-align: left"
                                           class=""><h4>{{ $pregunta->posicion
                                            }}. {{ $pregunta->pregunta }}</h4></label>


                                    <div class="">
                                        @foreach ($pregunta->opciones as $opcion)
                                        <div class="">
                                            <div class="radio">
                                                <label>

                                                    <input type="checkbox" name="{{$resultado->id}}pregunta{{ $pregunta->id }}[]"
                                                           id="{{$resultado->id}}opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}"
                                                           onclick="return false" onkeydown="return false"
                                                    @if ($resultado->respuestas()->get()->
                                                    where('idResultado', $resultado->id)->where('idPregunta',
                                                    $pregunta->id)->where('respuesta',$opcion->opcion)->first())
                                                           checked=""
                                                    @endif
                                                    >
                                                    {{ $opcion->opcion }}
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

                        @endforeach
                            <style>

                            </style>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = window.print();
</script>
</body>
</html>