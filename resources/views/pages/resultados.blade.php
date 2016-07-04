@extends("masterPage")

@section("content")
<div class="col-lg-offset-1 col-lg-10">
    <div class="row">
        <div class="well bs-component">
            <fieldset>
                <legend><strong>{{ $encuesta->titulo }}</strong></legend>
                <blockquote>
                    <p>{{ $encuesta->descripcion }}</p>
                </blockquote>
                <legend>Resultados</legend>
                @if(count($preguntas) < 1)
                    <h6><strong>No hay resultados disponibles</strong></h6>
                @endif
                <ul id="listaPreg" class="list-group">
                    @foreach ($preguntas as $pregunta)
                    @if ($pregunta->idTipoPregunta === 1 or $pregunta->idTipoPregunta === 2)
                        <h6><strong>{{$pregunta->posicion}}. {{$pregunta->pregunta}}</strong></h6>
                        <li class="list-group-item">
                            <ul class="list-group listarespuestas">
                                @foreach($pregunta->respuestas as $respuesta)
                                    <li class="list-group-item">
                                        <p>{{$respuesta->respuesta}}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @if ($pregunta->idTipoPregunta === 3 or $pregunta->idTipoPregunta === 4 or $pregunta->idTipoPregunta === 5)
                            <div class="row">
                        <div class="col-md-8">
                            <h5><strong>{{$pregunta->posicion}}. {{$pregunta->pregunta}}</strong></h5>
                        </div>

                        <div class="col-md-1">
                            <a class=" btn btn-success" id="descargar{{$pregunta->id}}"><i class="fa fa-download"></i></a>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group">
                                <a href="#" class="btn btn-success">Tipos  de  Gráficos</a>
                                <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @if ($pregunta->idTipoPregunta === 3 or $pregunta->idTipoPregunta === 4 or $pregunta->idTipoPregunta === 5)
                                    </br>
                                    <li><a href="{{$pregunta->id}}/cambiarTipoGrafico?tipoGrafico=3">Gráfico de Barras</a></li>
                                    <li class="divider"></li>
                                    @endif
                                    @if ($pregunta->idTipoPregunta === 3)
                                    </br>
                                    <li><a href="{{$pregunta->id}}/cambiarTipoGrafico?tipoGrafico=1">Gráfico de Pastel</a></li>
                                    <li class="divider"></li>
                                    @endif
                                    @if ($pregunta->idTipoPregunta === 3 or $pregunta->idTipoPregunta === 4 or $pregunta->idTipoPregunta === 5)
                                    </br>
                                    <li><a href="{{$pregunta->id}}/cambiarTipoGrafico?tipoGrafico=2">Gráfico de Columnas</a></li>
                                    <li class="divider"></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        </div>
                        </br>
                        <div class="row">
                        <li class="list-group-item">
                            <div id="pregunta{{ $pregunta->id }}" style="height: 300px;"></div>
                        </li>
                        </div>
                        </br>
                    @endif
                            </br>

                            </br>
                    @endforeach
                </ul>
                <div class="form-group">
                    <div>
                        <ul class="pager" style="cursor: pointer;">
                            @if ($preguntas->currentPage() === 1)
                            <li class="disabled"><a><h5><strong>Anterior</strong></h5></a></li>
                            @else
                            <li><a href="{{ $encuesta->id }}/cambiarPagina?currentPage={{ $preguntas->currentPage() }}&tipo=1"><h5><strong>Anterior</strong></h5></a></li>
                            @endif
                            @if (($preguntas->currentPage() === $preguntas->lastPage())or count($preguntas) < 1 )
                            <li class="disabled"><a id="end-survey"><h5><strong>Siguiente</strong></h5></a></li>
                            @else
                            <li><a href="{{ $encuesta->id }}/cambiarPagina?currentPage={{ $preguntas->currentPage() }}&tipo=2" id="next-page"><h5><strong>Siguiente</strong></h5></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                </fieldset>
    </div>
        </div>

</div>
    <script type="text/javascript" charset="utf-8">
        window.onload= graficos();

        google.charts.load("current", {packages:["corechart"]});

        function graficos() {
            @foreach ($preguntas as $pregunta)
                @if ($pregunta->idTipoGrafico === 1 and $pregunta->idTipoPregunta === 3)
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable([
                            ['Opciones', 'Opciones'],
                            @foreach ($pregunta->opciones as $opcion)
                                ['{!! str_replace('"',"",json_encode($opcion->opcion)) !!}', {{ $pregunta->respuestas->where('respuesta', $opcion->opcion)->count() }}],
                            @endforeach
                    ]);

                    var options = {
                        title: '{!!str_replace('"',"",json_encode($pregunta->pregunta))!!}',
                        is3D: true,
                        width: '100%'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('pregunta{{$pregunta->id}}'));
                    google.visualization.events.addListener(chart, 'ready', function () {
                        document.getElementById('descargar{{$pregunta->id}}').href = chart.getImageURI();
                        document.getElementById('descargar{{$pregunta->id}}').download = 'pregunta {{$pregunta->posicion}}.png';
                    });
                    chart.draw(data, options);
                    });
                @endif
                @if ($pregunta->idTipoGrafico === 2  and ($pregunta->idTipoPregunta === 3 or $pregunta->idTipoPregunta === 4 or $pregunta->idTipoPregunta === 5))
                    google.charts.setOnLoadCallback(function () {
                            var data = google.visualization.arrayToDataTable([
                                ['Opciones', 'Opciones'],
                                @foreach ($pregunta->opciones as $opcion)
                                    ['{!! str_replace('"',"",json_encode($opcion->opcion)) !!}', {{ $pregunta->respuestas->where('respuesta', $opcion->opcion)->count() }}],
                                @endforeach
                    ]);

                    var options = {
                        title: '{!!str_replace('"',"",json_encode($pregunta->pregunta))!!}',
                        width: '100%',
                        minValue: 0,
                        hAxis: {
                            title: 'Opciones',
                            format: 'none'
                        },
                        vAxis: {
                            title: 'Cantidad'
                        }

                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('pregunta{{$pregunta->id}}'));
                    google.visualization.events.addListener(chart, 'ready', function () {
                        document.getElementById('descargar{{$pregunta->id}}').href = chart.getImageURI();
                        document.getElementById('descargar{{$pregunta->id}}').download = 'pregunta {{$pregunta->posicion}}.png';
                    });

                    chart.draw(data, options);
                    });
                @endif
                @if ($pregunta->idTipoGrafico === 3 and ($pregunta->idTipoPregunta === 3 or $pregunta->idTipoPregunta === 4 or $pregunta->idTipoPregunta === 5))

                    google.charts.setOnLoadCallback(function () {
                            var data = google.visualization.arrayToDataTable([
                                ['Opciones', 'Opciones'],
                                    @foreach ($pregunta->opciones as $opcion)
                                        ['{!! str_replace('"',"",json_encode($opcion->opcion)) !!}', {{ $pregunta->respuestas->where('respuesta', $opcion->opcion)->count() }}],
                                    @endforeach
                    ]);

                    var options = {
                        title: '{!!str_replace('"',"",json_encode($pregunta->pregunta))!!}',
                        width: '100%',
                        hAxis: {
                            title: 'Cantidad',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Opciones'
                        }

                    };

                    var chart = new google.visualization.BarChart(document.getElementById('pregunta{{$pregunta->id}}'));
                    google.visualization.events.addListener(chart, 'ready', function () {
                        document.getElementById('descargar{{$pregunta->id}}').href = chart.getImageURI();
                        document.getElementById('descargar{{$pregunta->id}}').download = 'pregunta {{$pregunta->posicion}}.png';
                    });
                    chart.draw(data, options);
                    });
                @endif
            @endforeach
        }
    </script>
@stop