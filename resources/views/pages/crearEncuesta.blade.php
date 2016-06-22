
@extends("masterPage")

@section("content")
@if ($encuesta->titulo === '' || $encuesta->descripción === '')
<div class="alert alert-dismissible alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Hola!</strong> Antes de comenzar con las preguntas rellena el titulo y la descripción de la encuesta.
</div>
@else
<div class="col-lg-3 col-md-3 col-sm-4">
    <div class="panelP">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal">
            <legend>Panel de preguntas</legend>
            <button class="list-group-item" type="button" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=1'">Respuesta Corta</button>
            <button class="list-group-item" type="button" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=2'">Respuesta Larga</button>
            <button class="list-group-item" type="button" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=3'">Selección Unica</button>
            <button class="list-group-item" type="button" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=5'">Selección Multiple</button>
            <button class="list-group-item" type="button" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/preguntas?tipo=4'">Escala Lineal (1-5)</button>
                    <br><button type="button" onclick="" class="btn btn-success" id="guardaEncuesta">Guardar Encuesta</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
<div class="col-lg-9">
    <div class="row">
        <div class="well bs-component">

        <blockquote class="blockquote-reverse">
            <p class="text-success" style="text-align: right;"><strong>*Presione ENTER para guardar automaticamente luego de hacer un cambio.</strong></p>
        </blockquote>
            <form method="post" action="crearEncuesta/{{ $encuesta->id }}/guardar" id="encuestaNueva" class="form-horizontal">
                <fieldset>
                    <legend>Información de la Encuesta</legend>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-9">
                            <input type="text" value="{{ $encuesta->titulo }}" onkeypress="guardarEncuesta('titulo', 'titulo');" name="titulo" class="form-control" id="inputTitulo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Descripción</label>
                        <div class="col-lg-9">
                            <textarea name="descripcion" class="form-control" rows="3" id="descrip">{{ $encuesta->descripcion }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Categorias</label>
                        <div class="col-lg-9">
                            @foreach($tags as $tag)
                                @if ($encuesta->tags->contains($tag))
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}" checked>{{$tag->nombre}}
                                @else
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->nombre}}
                                @endif
                                    @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-offset-8">
                            <button type="submit" style="display: none" class="btn btn-success">Guardar Encuesta</button>
                        </div>
                    </div>
                    <legend>Preguntas</legend>
                    <ul id="sortable-with-handles" class="sortable list-group">
                        @foreach ($encuesta->preguntas()->orderby('posicion')->get() as $pregunta)
                            @if ($pregunta->idTipoPregunta === 1)
                                <li class="list-group-item">
                                    <span class="handle"><p>{{ $pregunta->posicion }}::</p></span>
                                    <input name="posPregunta{{ $pregunta->id }}" type="hidden" value=""/>
                                    <div class="form-group">
                                        <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="{{ $pregunta->id }}" class="form-control" id="pregunta{{ $pregunta->id }}" value="{{ $pregunta->pregunta }}" placeholder="Sin Redactar">
                                        </div>
                                        <button type="button" data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/eliminar?idP={{ $pregunta->id }}'"><strong>X</strong></button>
                                    </div>
                                    <div class="form-group">
                                        <label for="textArea" class="col-lg-2 control-label">Respuesta</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" disabled="" rows="3" id="texto">
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @if ($pregunta->idTipoPregunta === 2)
                        <li class="list-group-item">
                            <span class="handle"><p>{{ $pregunta->posicion }}::</p></span>
                            <input name="posPregunta{{ $pregunta->id }}" type="hidden" value=""/>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" name="{{ $pregunta->id }}" class="form-control" id="pregunta{{ $pregunta->id }}" value="{{ $pregunta->pregunta }}" placeholder="Sin Redactar">
                                </div>
                                <button type="button" data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/eliminar?idP={{ $pregunta->id }}'"><strong>X</strong></button>
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
                            <span class="handle"><p>{{ $pregunta->posicion }}::</p></span>
                            <input name="posPregunta{{ $pregunta->id }}" type="hidden" value=""/>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" name="{{ $pregunta->id }}" class="form-control" id="pregunta{{ $pregunta->id }}" value="{{ $pregunta->pregunta }}" placeholder="Sin Redactar">
                                </div>
                                <button type="button" data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/eliminar?idP={{ $pregunta->id }}'"><strong>X</strong></button>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Opciones</label>
                                <div class="col-lg-10">
                                    @foreach ($pregunta->opciones as $opcion)
                                        <div class="col-lg-8">
                                            <input type="text" style="margin-bottom: 10px;" name="opcion{{ $opcion->id }}" class="form-control" id="opcion{{ $opcion->id }}" value="{{ $opcion->opcion }}" placeholder="Agrega algún texto">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="button" name="agregarOp" class="btn btn-primary" onclick="location.href = '/crearEncuesta/{{ $encuesta->id }}/opciones?id={{ $pregunta->id }}'">Agregar una opción</button>
                                </div>

                            </div>
                        </li>
                        @endif
                        @if ($pregunta->idTipoPregunta === 4)
                        <li class="list-group-item">
                            <span class="handle"><p>{{ $pregunta->posicion }}::</p></span>
                            <input name="posPregunta{{ $pregunta->id }}" type="hidden" value=""/>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" name="{{ $pregunta->id }}" class="form-control" id="pregunta{{ $pregunta->id }}" value="{{ $pregunta->pregunta }}" placeholder="Sin Redactar">
                                </div>
                                <button type="button" data-toggle="tooltip" title="Eliminar Pregunta" class="btn btn-danger" onclick="location.href = 'crearEncuesta/{{ $encuesta->id }}/eliminar?idP={{ $pregunta->id }}'"><strong>X</strong></button>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Escala</label>
                                <div class="col-lg-10">
                                    @foreach ($pregunta->opciones as $opcion)
                                        <div class="col-lg-2">
                                            <label>
                                                <input type="radio" name="optionsRadios"  style="margin-top: 10px;" disabled="">
                                                {{ $opcion->posicion }}
                                                <input type="text" class="form-control" name="descripcion{{ $opcion->posicion }}" value="{{ $opcion->opcion }}">
                                            </label>
                                        </div>
                                    @endforeach
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
        window.onload=function(){
            var pos=window.name || 0;
            window.scrollTo(0,pos);
            ordenarPos();
        }
        window.onunload=function(){
            window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
        }
    </script>
    <script>
        document.getElementById("sortable-with-handles").addEventListener("mouseout", function( event ) {
            $('#sortable-with-handles li p').each(function(i) {
                $(this).text(i+1 + '::');
                $(this).show();
            });
            $('#sortable-with-handles li input[type=hidden]').each(function(i) {
                $(this).val(i+1);
                $(this).show();
            });
        });

        function ordenarPos () {
            $('#sortable-with-handles li p').each(function(i) {
                $(this).text(i+1 + '::');
                $(this).show();
            });
            $('#sortable-with-handles li input[type=hidden]').each(function(i) {
                $(this).val(i+1);
                $(this).show();
            });
        }

        $(function() {
            $('#sortable-with-handles').sortable({
                handle:'.handle'
            });
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        var defaultText = 'Click encima y agrega algún texto.';

        function endEdit(e) {
            var input = $(e.target),
                label = input && input.prev();

            label.text(input.val());
            input.hide();
            label.show();
        }

        $('.clickedit').hide()
            .focusout(endEdit)
            .keyup(function (e) {
                if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                    endEdit(e);
                    return false;
                } else {
                    return true;
                }
            })
            .prev().click(function () {
                $(this).hide();
                $(this).next().show().focus();
            });

        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    document.getElementById('encuestaNueva').submit();
                }
            });
        });

        $(document).on('click', '#guardaEncuesta', function() {
            document.getElementById('encuestaNueva').submit();

        });
    </script>
</div>
@stop


