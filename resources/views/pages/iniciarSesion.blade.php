@extends("masterPage")

@section("content")
    <div class="col-lg-offset-3 col-lg-5">
        <div class="row">
                <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <legend>Iniciar Sesión</legend>
                <div class="form-group">
                    <label for="InputCarné" class="col-lg-2 control-label">Numero de Carné</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="InputCarné" placeholder="Carné">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> No soy un robot.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-primary">Registrarse</button>
                        <button type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                </div>
            </fieldset>
        </form>
                    </div>
            </div>
    </div>
@stop