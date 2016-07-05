@extends("masterPage")
@section("content")
<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-5">
        <div class="well bs-component">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('buscar/avanzada') }}">
                <fieldset>
                    <legend>Búsqueda avanzada</legend>
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" name="titulo" class="form-control" id="inputTitulo"
                                   value="{{$titulo}}" placeholder="Título de la encuesta">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Categorías</label>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-11">
                            <?php $ind = 0; ?>
                            @foreach($tags as $tag)
                            @if($ind == 0)
                            <div class="col-lg-3 col-xs-6 col-sm-6 col-md-6">
                                @endif
                                @if (in_array($tag->id,$catego))
                                <div class="checkbox">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]" value="{{$tag->id}}" checked>{{$tag->nombre}}
                                    </label>
                                </div>
                                @else
                                <div class="checkbox">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->nombre}}
                                    </label>
                                </div>
                                @endif
                                <?php $ind = $ind + 1; ?>
                                @if($ind == 3)
                            </div>
                            <?php $ind = 0; ?>
                            @endif
                            @endforeach
                            </br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Año</label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <input type="text" name="añoDe" class="form-control" id="añoDE" value="{{$de}}"
                                   readonly='true' placeholder="De">
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <input type="text" name="añoHasta" class="form-control" id="añoHASTA"
                                   readonly='true' value="{{$hasta}}" placeholder="Hasta">
                        </div>
                    <br>
                    <button type="submit" class="btn btn-success center-block">
                        <i class="fa fa-btn fa-search"></i>Filtrar
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-lg-7">
        <div id="listaPreguntas">
            <legend>Resultados de la búsqueda</legend>
            <div class="form-group">
                <div class="col-lg-12">
                    <ol>
                        <?php $ind = 1; ?>
                        @foreach($encuestas as $enc)
                        <li>
                            <h3><a href="/buscar/resultadoEncuesta/{{$enc->id}}">{{$enc->titulo}}</a></h3>

                            <div class="detallesEncuesta">
                                @if(count($enc->tags) >0)
                                <p> Categorías:
                                    @foreach($enc->tags as $tag)

                                    @if(count($enc->tags) == $ind)
                                    {{$tag->nombre ."."}}
                                    @else
                                    {{$tag->nombre .", "}}
                                    @endif
                                    <?php $ind = $ind + 1; ?>
                                    @endforeach
                                    <?php $ind = 1; ?>
                                </p>
                                @else
                                <p>Sin categorías</p>
                                @endif
                                <p>Año de realización: {{$enc->añoTerminado}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    @if($encuestas->count() == 0)
                    <h3>No se han encontrado resultados</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#añoDE").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: ' yy',
            showButtonPanel: true
        }).focus(function () {
            var thisCalendar = $(this);
            $('.ui-datepicker-calendar').detach();
            $('.ui-datepicker-close').click(function () {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                thisCalendar.datepicker('setDate', new Date(year, month, 1));
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#añoHASTA").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: ' yy',
            showButtonPanel: true
        }).focus(function() {
            var thisCalendar = $(this);
            $('.ui-datepicker-calendar').detach();
            $('.ui-datepicker-close').click(function() {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                thisCalendar.datepicker('setDate', new Date(year, month, 1));
            });
        });
    });
</script>
@stop