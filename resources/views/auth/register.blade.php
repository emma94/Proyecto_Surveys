@extends("masterPage")

@section("content")
    <div class="col-lg-offset-3 col-lg-5">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    <fieldset>
                        <legend>Iniciar Sesión</legend>
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nombreCompleto') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre completo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombreCompleto" value="{{ old('nombreCompleto') }}">

                                @if ($errors->has('nombreCompleto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombreCompleto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <div class="input-append date" name="fechaNacimiento" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                    <input name="fechaNacimiento" class="span2" size="16" value="12-02-2012" readonly="" type="text">
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
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

                        <div class="form-group{{ $errors->has('idCarrera') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Carrera universitaria</label>

                            <div class="col-md-6">
                                <select name='idCarrera'>
                                    <option value="1">Informatica</option>
                                    <option value="2">Quimica</option>
                                    <option value="3">Trabajo social, yohan loves this</option>
                                </select>

                                @if ($errors->has('idCarrera'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idCarrera') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fechaIngreso') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha de Ingreso</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fechaIngreso" value="{{ old('fechaIngreso') }}">
                                @if ($errors->has('fechaIngreso'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechaIngreso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('idDistrito') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Carrera universitaria</label>

                            <div class="col-md-6">
                                <select name='idProvincia'>
                                    <option value="1">Alajuela</option>
                                    <option value="2">Heredia</option>
                                    <option value="3">Limon</option>
                                </select>
                                <select name='idCanton'>
                                    <option value="1">Grecia</option>
                                    <option value="2">Santo Domingo</option>
                                    <option value="3">Guapiles</option>
                                </select>
                                <select name='idDistrito'>
                                    <option value="1">Tacares</option>
                                    <option value="2">Santa Gertrudis</option>
                                    <option value="3">San Roque</option>
                                </select>

                                @if ($errors->has('idDistrito'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idDistrito') }}</strong>
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
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop