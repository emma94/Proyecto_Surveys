
@extends("masterPage")

@section("content")

    <div class="col-lg-9">
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
                            <label for="textArea" class="col-lg-2 control-label">Descripción</label>
                            <div class="col-lg-9">
                                <input type="text" name="descripcion"  class="form-control" rows="5" id="descrip"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label">Categorias</label>
                            <div class="col-lg-9">
                                @foreach($tags as $tag)
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->nombre}}
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-offset-8">
                                <button type="submit"  class="btn btn-success">Continuar</button>
                            </div>
                        </div>
                        </fieldset>
                        </form>

    </div>
    </div>
    </div>
@stop


