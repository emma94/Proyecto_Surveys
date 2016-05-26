@extends("masterPage")

@section("content")
    <div class="col-lg-offset-2 col-lg-8">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('cambioContrasena/updDataPassword') }}">
                    <fieldset>
                        <legend>Contraseña</legend>
                        {!! csrf_field() !!}

                        <div class="col-lg-12">
                            <div class="col-lg-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirmar contraseña</label>

                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @if (strlen($msjExito)>0)
                                <div class="alert alert-success fade in col-md-5" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Éxito!</strong> {{$msjExito}}
                                </div>
                                <script type="text/javascript">
                                    $("#success-alert").fadeTo(4000, 500).slideUp(500, function(){
                                        $("#success-alert").alert('close');
                                    });
                                </script>
                            @endif
                            <div class="form-group">
                                <div class="col-md-offset-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Guardar contraseña
                                    </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
@stop




