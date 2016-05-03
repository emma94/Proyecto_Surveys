@extends("masterPage")

@section("content")
    <div class="col-lg-offset-3 col-lg-5">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    <fieldset>
                        <legend>Iniciar Sesión</legend>
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primerApellido') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Primer Apellido</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="primerApellido" value="{{ old('primerApellido') }}">

                                @if ($errors->has('primerApellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primerApellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('segundoApellido') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Segundo Apellido</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="segundoApellido" value="{{ old('segundoApellido') }}">

                                @if ($errors->has('segundoApellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('segundoApellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">fechaNacimiento</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}">

                                @if ($errors->has('fechaNacimiento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechaNacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('carne') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Carne</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="carne" value="{{ old('carne') }}">

                                @if ($errors->has('carne'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carne') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">correo</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="correo" value="{{ old('correo') }}">

                                @if ($errors->has('correo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop