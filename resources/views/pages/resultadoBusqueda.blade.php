@extends("masterPage")
@section("content")

<div class="col-lg-10 col-lg-offset-1" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="well bs-component">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('buscar/avanzada') }}">
                <fieldset>
                    <legend>Busqueda avanzada</legend>
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo de la encuesta</label>

                        <div class="col-lg-9">
                            <input type="text" name="titulo" class="form-control" id="inputTitulo" value="{{$titulo}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Categorías</label>

                        <div class="col-lg-9">
                            <?php $ind = 0; ?>
                            @foreach($tags as $tag)
                            @if($ind == 0)
                            <div class="col-lg-3 col-xs-5 col-sm-5 col-md-5">
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
                            </br>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Año</label>

                        <div class="col-lg-2 col-sm-2 col-md-2">
                            <input type="number" name="añoDe" class="form-control" id="añoDE" value="{{$de}}" placeholder="De">
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2">
                            <input type="number" name="añoHasta" class="form-control" id="añoHASTA" value="{{$hasta}}" placeholder="Hasta">
                        </div>
                    </div>

        </div>

        <div class="row">
            <div class="col-lg-offset-5">
                <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-search"></i>Buscar</button>
                </br>
                </br>
                </br>
            </div>
        </div>

        </fieldset>
        </form>
        <fieldset>
            <legend>Resultados de la busqueda</legend>
            <div class="col-lg-11">
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
        </fieldset>
    </div>
</div>
</div>
@stop