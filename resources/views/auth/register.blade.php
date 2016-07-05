@extends("masterPage")

@section("content")

<div class="row col-lg-12">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    <fieldset>
                        <legend>Registro</legend>
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-offset-7">*Todos los campos son requeridos*</label>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 form-group{{ $errors->has('nombreCompleto') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Nombre completo</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="nombreCompleto"
                                           value="{{ old('nombreCompleto') }}">

                                    @if ($errors->has('nombreCompleto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombreCompleto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 form-group{{ $errors->has('carne') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Carné</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="carne" value="{{ old('carne') }}">

                                    @if ($errors->has('carne'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carne') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Correo Electrónico</label>

                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Contraseña</label>

                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div
                                class="col-lg-12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Confirmar contraseña</label>

                                <div class="col-md-10">
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
                                    <button type="submit" class="btn btn-primary center-block">
                                        <i class="fa fa-btn fa-user"></i>Registrarse
                                    </button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop