@extends("masterPage")

@section("content")
    <div class="col-lg-offset-2 col-lg-8">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    <fieldset>
                        <legend>Registrarse</legend>
                        {!! csrf_field() !!}
                        <div class="col-lg-12">
                            <div class="col-lg-8 form-group{{ $errors->has('nombreCompleto') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">Nombre completo</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nombreCompleto" value="{{ old('nombreCompleto') }}">

                                    @if ($errors->has('nombreCompleto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombreCompleto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 form-group{{ $errors->has('carne') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Carne</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="carne" value="{{ old('carne') }}">

                                    @if ($errors->has('carne'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carne') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6 form-group{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Nacimiento</label>

                                <div class="col-md-8">
                                    <div class="input-append date" >
                                        <input name="fechaNacimiento" class="form-control" size="16" type="date" value="12-02-2012">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                    @if ($errors->has('fechaNacimiento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fechaNacimiento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Correo Electrónico</label>

                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="correo" value="{{ old('correo') }}">

                                    @if ($errors->has('correo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('correo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6 form-group{{ $errors->has('idCarrera') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Carrera universitaria</label>

                                <div class="col-md-8">
                                    <select name='idCarrera' class="form-control">
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

                            <div class="col-lg-6 form-group{{ $errors->has('fechaIngreso') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Año de Ingreso</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="fechaIngreso" value="{{ old('fechaIngreso') }}">
                                    @if ($errors->has('fechaIngreso'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fechaIngreso') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group{{ $errors->has('idDistrito') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Dirección</label>
                                <div class="col-md-9">
                                    <div class="col-lg-4">
                                        <select name='idProvincia' class="form-control">
                                            <option value="1">Alajuela</option>
                                            <option value="2">Heredia</option>
                                            <option value="3">Limon</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name='idCanton' class="form-control">
                                            <option value="1">Grecia</option>
                                            <option value="2">Santo Domingo</option>
                                            <option value="3">Guapiles</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name='idDistrito' class="form-control">
                                            <option value="1">Tacares</option>
                                            <option value="2">Santa Gertrudis</option>
                                            <option value="3">San Roque</option>
                                        </select>
                                    </div>

                                    @if ($errors->has('idDistrito'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('idDistrito') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
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
                            <div class="form-group">
                                <div class="col-md-offset-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Registrar
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