@extends("masterPage")

@section("content")
    <div class="col-lg-offset-1 col-lg-10">
        <div class="row">
            <div class="well bs-component">
                <form method="post" action="/cuestionario/{{ $encuesta->id }}/cambiarPagina" id="encuestaNueva" class="form-horizontal">
                    <fieldset>
                    <legend><strong>{{ $encuesta->titulo }}</strong></legend>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="current" value=""/>
                    <input type="hidden" name="currentPage" value="{{ $preguntas->currentPage() }}"/>
                    <input type="hidden" name="ruta" value="{{ $ruta }}"/>
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
                                    <input type="text" class="form-control" name="pregunta{{ $pregunta->id }}" rows="3" id="texto" value="{{ Session::get('pregunta'.$pregunta->id) }}">
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
                                    <textarea class="form-control" name="pregunta{{ $pregunta->id }}" rows="3" id="textArea">{{ Session::get('pregunta'.$pregunta->id) }}</textarea>
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
                                                @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === $opcion->opcion)
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
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '1')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="1">
                                                1
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="1">
                                                1
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '2')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="2">
                                                2
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="2">
                                                2
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '3')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="3">
                                                3
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="3">
                                                3
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '4')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="4">
                                                4
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="4">
                                                4
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '5')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="5">
                                                5
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="5">
                                                5
                                            @endif
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
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '1')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="1">
                                                1
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="1">
                                                1
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '2')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="2">
                                                2
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="2">
                                                2
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '3')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="3">
                                                3
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="3">
                                                3
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '4')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="4">
                                                4
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="4">
                                                4
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '5')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="5">
                                                5
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="5">
                                                5
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '6')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="6">
                                                6
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="6">
                                                6
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '7')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="7>
                                                7
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="7">
                                                7
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '8')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="8">
                                                8
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="8">
                                                8
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '9')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="9">
                                                9
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="9">
                                                9
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label>
                                            @if (Session::get('pregunta'.$pregunta->id) != null && Session::get('pregunta'.$pregunta->id) === '10')
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" checked="" value="10">
                                                10
                                            @else
                                                <input type="radio" name="pregunta{{ $pregunta->id }}"  style="margin-top: 10px;" value="10">
                                                10
                                            @endif
                                        </label>
                                    </div>
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
                                    <li class="disabled"><a onclick="cambiarPag(1)">Anterior</a></li>
                                @else
                                    <li><a onclick="cambiarPag(1)">Anterior</a></li>
                                @endif
                                @if ($preguntas->currentPage() === $preguntas->lastPage())
                                    <li><a onclick="cambiarPag(3)">Enviar Encuesta</a></li>
                                @else
                                    <li><a onclick="cambiarPag(2)">Siguiente</a></li>
                                @endif
                            </ul>
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
            $(document.getElementById('encuestaNueva')).submit();
        }
    </script>
@stop

