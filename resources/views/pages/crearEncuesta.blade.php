
@extends("masterPage")

@section("content")
<div class="col-lg-3 col-md-3 col-sm-4">
    <br>
    <div class="panelP">
    <legend>Panel de preguntas</legend>
        <div class="list-group table-of-contents">
            <form method="post" action="crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=1">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button class="list-group-item" type="submit">Pregunta Cerrada</button>
            </form>
            <form method="post" action="crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=2">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button class="list-group-item" type="submit">Pregunta Abierta</button>
            </form>
            <form method="post" action="crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=3">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button class="list-group-item" type="submit">Selección Multiple</button>
            </form>
            <form method="post" action="crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=4">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button class="list-group-item" type="submit">Escala lineal</button>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-9">
    <div class="row">
        <div class="well bs-component">
            <form class="form-horizontal">
                <fieldset>
                    <legend>Información de la Encuesta</legend>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-9">
                            <input type="text" name="titulo" class="form-control" id="inputTitulo" placeholder="{{ $encuesta->titulo }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Descripción</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="3" id="textArea"></textarea>
                        </div>
                    </div>
                    <legend>Preguntas</legend>
                    <ul id="sortable-with-handles" class="sortable list-group">
                        @foreach ($encuesta->preguntas as $pregunta)
                            @if ($pregunta->idTipoPregunta === 1)
                                <li class="list-group-item">
                                    <span class="handle">::</span>
                                    <div class="form-group">
                                        <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="pregunta{{ $pregunta->id }}" placeholder="{{ $pregunta->pregunta }}">
                                        </div>
                                        <button data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger"><strong>X</strong></button>
                                    </div>
                                    <div class="form-group">
                                        <label for="textArea" class="col-lg-2 control-label">Respuesta</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" disabled="" rows="3" id="texto"></input>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @if ($pregunta->idTipoPregunta === 2)
                        <li class="list-group-item">
                            <span class="handle">::</span>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="pregunta{{ $pregunta->id }}" placeholder="{{ $pregunta->pregunta }}">
                                </div>
                                <button data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger"><strong>X</strong></button>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Respuesta</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" disabled="" rows="3" id="textArea"></textarea>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 3)
                        <li class="list-group-item">
                            <span class="handle">::</span>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="pregunta{{ $pregunta->id }}" placeholder="{{ $pregunta->pregunta }}">
                                </div>
                                <button data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger"><strong>X</strong></button>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Respuesta</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" disabled="" rows="3" id="textArea"></textarea>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 4)
                        <li class="list-group-item">
                            <span class="handle">::</span>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="pregunta{{ $pregunta->id }}" placeholder="{{ $pregunta->pregunta }}">
                                </div>
                                <button data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger"><strong>X</strong></button>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Respuesta</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" disabled="" rows="3" id="textArea"></textarea>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </fieldset>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            $('#sortable-with-handles').sortable({
                handle: '.handle'
            });
        });
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</div>
@stop


