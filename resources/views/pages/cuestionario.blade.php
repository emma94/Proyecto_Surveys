@extends("masterPage")

@section("content")
    <div class="col-lg-offset-1 col-lg-10">
        <div class="row">
            <div class="well bs-component">
                <form method="post" action="/cuestionario/cambiarPagina" id="encuestaNueva" class="form-horizontal">
                    <fieldset>
                    <legend><strong>{{ $encuesta->titulo }}</strong></legend>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="current" value=""/>
                    <blockquote>
                        <p>{{ $encuesta->descripcion }}</p>
                    </blockquote>
                    <legend>Preguntas</legend>
                    <ul id="listaPreg" class="sortable list-group">
                        @foreach ($preguntas as $pregunta)
                        @if ($pregunta->idTipoPregunta === 1)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left" class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion }}. {{ $pregunta->pregunta }}</h4></label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    <input type="text" class="form-control" name="pregunta{{ $pregunta->id }}" rows="3" id="texto">
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 2)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left" class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion }}. {{ $pregunta->pregunta }}</h4></label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    <textarea class="form-control" name="pregunta{{ $pregunta->id }}" rows="3" id="textArea"></textarea>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 3)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left" class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion }}. {{ $pregunta->pregunta }}</h4></label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    @foreach ($pregunta->opciones as $opcion)
                                    <div class="col-lg-8">
                                        <div class="radio">
                                            <label>
                                                @if ($opcion->posicion === 1)
                                                    <input type="radio" name="pregunta{{ $pregunta->id }}" id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}" checked="">
                                                    {{ $opcion->opcion }}
                                                @else
                                                    <input type="radio" name="pregunta{{ $pregunta->id }}" id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}">
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
                                <label for="pregunta" style="text-align: left" class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion }}. {{ $pregunta->pregunta }}</h4></label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    <div class="col-lg-2">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="1">
                                            1
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="2">
                                            2
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="3">
                                            3
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="4">
                                            4
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="5">
                                            5
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 5)
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="pregunta" style="text-align: left" class="col-lg-offset-1 col-lg-11 control-label"><h4>{{ $pregunta->posicion }}. {{ $pregunta->pregunta }}</h4></label>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="1">
                                            1
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="2">
                                            2
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="3">
                                            3
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="4">
                                            4
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="5">
                                            5
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="6">
                                            6
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="7">
                                            7
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="8">
                                            8
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="9">
                                            9
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="10">
                                            10
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="form-group">
                        <div class="col-lg-offset-5">
                            <ul class="pager">
                                <li><a onclick="cambiarPag(1)">Anterior</a></li>
                                <li><a onclick="cambiarPag(2)">Siguiente</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-5">
                            <a class="btn btn-success" href="/cuestionario/{{ $encuesta->id }}/guardarResultado">Enviar Encuesta</a>
                        </div>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function cambiarPag(num) {
            $(document.getElementsByName('current')).val(num);
            $(document.getElementsById('encuestaNueva')).submit;
        }
    </script>
@stop

