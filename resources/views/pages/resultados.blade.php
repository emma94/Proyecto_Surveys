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
                        <h6><strong>{{$pregunta->posicion}}. {{$pregunta->pregunta}}</strong></h6>
                        <li class="list-group-item">
                            <div id="pregunta{{ $pregunta->id }}" style="width: 890px; height: 300px;"></div>
                        </li>
                    @endif
                    @endforeach
                </ul>
    </div>
</div>
    <script type="text/javascript">
        window.onload = graficos();
        google.charts.load("current", {packages:["corechart"]});

        function graficos() {
            @foreach ($preguntas as $pregunta)
                @if ($pregunta->idTipoPregunta === 3)

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable([
                            ['Opciones', ''],
                            @foreach ($pregunta->opciones as $opcion)
                                ['{{ $opcion->opcion }}', {{ $pregunta->respuestas->where('respuesta', $opcion->opcion)->count() }}],
                            @endforeach
                        ['fin',0]
                    ]);

                    var options = {
                        title: '{{ $pregunta->pregunta}}',
                        is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('pregunta{{$pregunta->id}}'));
                    chart.draw(data, options);
                    });
                @endif
                @if ($pregunta->idTipoPregunta === 4)

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable([
                            ['Opciones', 'Nivel de Escala'],
                            ['1', {{$pregunta->respuestas->where('respuesta', '1')->count()}}],
                            ['2', {{$pregunta->respuestas->where('respuesta', '2')->count()}}],
                            ['3', {{$pregunta->respuestas->where('respuesta', '3')->count()}}],
                            ['4', {{$pregunta->respuestas->where('respuesta', '4')->count()}}],
                            ['5', {{$pregunta->respuestas->where('respuesta', '5')->count()}}],
                    ]);

                    var options = {
                        title: '{{ $pregunta->pregunta}}',
                        hAxis: {
                            title: 'Escala',
                            format: 'none'
                        },
                        vAxis: {
                            title: 'Cantidad'
                        }

                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('pregunta{{$pregunta->id}}'));
                    chart.draw(data, options);
                    });
                @endif
                @if ($pregunta->idTipoPregunta === 5)

                    google.charts.setOnLoadCallback(function () {
                            var data = google.visualization.arrayToDataTable([
                                ['Opciones', 'Nivel de Escala'],
                                ['1', {{$pregunta->respuestas->where('respuesta', '1')->count()}}],
                                ['2', {{$pregunta->respuestas->where('respuesta', '2')->count()}}],
                                ['3', {{$pregunta->respuestas->where('respuesta', '3')->count()}}],
                                ['4', {{$pregunta->respuestas->where('respuesta', '4')->count()}}],
                                ['5', {{$pregunta->respuestas->where('respuesta', '5')->count()}}],
                                ['6', {{$pregunta->respuestas->where('respuesta', '6')->count()}}],
                                ['7', {{$pregunta->respuestas->where('respuesta', '7')->count()}}],
                                ['8', {{$pregunta->respuestas->where('respuesta', '8')->count()}}],
                                ['9', {{$pregunta->respuestas->where('respuesta', '9')->count()}}],
                                ['10', {{$pregunta->respuestas->where('respuesta', '10')->count()}}],
                                ]);

                    var options = {
                        title: '{{ $pregunta->pregunta}}',
                        hAxis: {
                            title: 'Escala',
                            format: 'none'
                        },
                        vAxis: {
                            title: 'Cantidad'
                        }

                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('pregunta{{$pregunta->id}}'));
                    chart.draw(data, options);
                    });
                @endif
            @endforeach
        }
    </script>
@stop