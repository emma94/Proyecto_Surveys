
@extends("masterPage")

@section("content")

    <div class="col-lg-10 col-lg-offset-1" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="well bs-component">


                <form class="form-horizontal" role="form" method="POST" action="{{ url('/crearEncuesta/guardar') }}">
                    <fieldset>
                        <legend>Información de la Encuesta</legend>
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                            <div class="col-lg-9">
                                <input type="text"  name="titulo" class="form-control" id="inputTitulo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descrip" class="col-lg-2 control-label">Descripción</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" id="descrip" name="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label">Categorias</label>
                            <div class="col-lg-9">
                                <?php $ind = 0; ?>
                                @foreach($tags as $tag)
                                        @if($ind == 0)
                                            <div class="col-lg-3 col-xs-5 col-sm-5 col-md-5">
                                                @endif
                                                <div class="checkbox">
                                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->nombre}}
                                                </div>
                                                <?php $ind = $ind + 1; ?>
                                                @if($ind == 3)
                                            </div>
                                            <?php $ind = 0; ?>
                                        @endif
                                @endforeach
                                            </br>
                                            </br>
                                            </br>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-lg-offset-5">
                                <button type="submit"  class="btn btn-success">Guardar y Continuar</button>
                            </div>
                        </div>

                        </fieldset>
                        </form>

    </div>
    </div>
    </div>
@stop


