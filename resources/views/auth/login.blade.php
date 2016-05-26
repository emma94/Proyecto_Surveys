@extends("masterPage")

@section("content")
    <div class="col-lg-offset-3 col-lg-5">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <fieldset>
                        <legend>Iniciar Sesión</legend>
                        <div class="form-group {{ $errors->has('carne') ? ' has-error' : '' }}">
                            <label for="InputCarné" class="col-lg-2 control-label">Numero de Carné</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="carne" value="{{ old('carne') }}" placeholder="Carné">
                                @if ($errors->has('carne'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carne') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                                <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Mantener sesion iniciada
                                    </label>
                                </div>
                            </div>


                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">

                                <button type="submit" class="btn btn-success">Ingresar</button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Has olvidado tu contraseña?</a>
                            </div>
                        </div>
                          <hr/>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-4">
                                <p>o también puedes</p>
                            </div>
                            <div class="col-lg-10 col-lg-offset-3">
                                <a href="redirect" class="btn btn-primary">Iniciar sesión con Facebook</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop