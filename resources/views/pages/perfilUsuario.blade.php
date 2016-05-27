@extends("masterPage")

@section("content")
    <div class="col-lg-offset-2 col-lg-8">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('miperfil/updData') }}">
                    <fieldset>
                        <legend>Datos Personales</legend>
                        {!! csrf_field() !!}
                        <div class="col-lg-12">
                            <div class="col-lg-11 form-group{{ $errors->has('nombreCompleto') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">Nombre completo</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nombreCompleto" value="{{ $usuario->nombreCompleto }}">

                                    @if ($errors->has('nombreCompleto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombreCompleto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-11 form-group{{ $errors->has('carne') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">Carne</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="carne" value="{{$usuario->carne}}">

                                    @if ($errors->has('carne'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carne') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-10 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Correo Electrónico</label>

                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" value="{{ $usuario->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="col-lg-12">
                            @if (strlen($msjExito)>0)
                                <div class="alert alert-success fade in col-md-5">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Éxito!</strong> {{$msjExito}}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="col-md-offset-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Guardar cambios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
            <a href="/enviarEncuesta">Enviar una encuesta</a>
        </div>
    </div>
@stop