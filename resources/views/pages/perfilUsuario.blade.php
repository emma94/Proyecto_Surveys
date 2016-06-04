@extends("masterPage")

@section("content")
    <div class="col-lg-offset-1 col-lg-10">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('miperfil/updData') }}">
                    <fieldset>
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs nav-pills">
                                <li class="active"><a href="#miperfil" data-toggle="tab" aria-expanded="true">Mi Perfil</a></li>
                                <li class=""><a href="#encuestas" data-toggle="tab" aria-expanded="false">Mis Encuestas</a></li>
                                <li class=""><a href="#contactos" data-toggle="tab" aria-expanded="false">Contactos</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="miperfil">
                                    <div>
                                        <br/>
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

                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="carne" value="{{$usuario->carne}}">

                                                    @if ($errors->has('carne'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carne') }}</strong>
                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-11 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label">Correo Electrónico</label>

                                                <div class="col-md-9">
                                                    <input type="email" class="form-control" name="email" value="{{ $usuario->email }}">

                                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            @if (strlen($msjExito)>0)
                                            <div class="alert alert-success fade in col-md-5">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Éxito!</strong> {{$msjExito}}
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <div class="col-md-offset-10">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-user"></i>Guardar cambios
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="encuestas">
                                    <br/>
                                    <legend>Encuestas</legend>
                                    <div class="col-lg-12">
                                        <ul class="list-group ">
                                            @foreach ($usuario->encuestas as $encuesta)
                                            <li class="list-group-item">
                                                <div class="col-lg-6">
                                                    <h5>{{$encuesta->titulo}}</h5>
                                                </div>
                                                <a href="/crearEncuesta?id={{ $encuesta->id}}" class="btn  btn-info">
                                                    <i class="fa fa-btn fa-plus"> Ver más</i>
                                                </a>
                                                <a href="/enviarEncuesta?id={{ $encuesta->id}}" class="btn  btn-success">
                                                    <i class="fa fa-btn fa-share"> Compartir</i>
                                                </a>
                                                <a href="" class="btn  btn-primary">
                                                    <i class="fa fa-btn"> Iniciar Encuesta</i>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contactos">
                                    <br/>
                                    <legend>Contactos</legend>

                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
        </div>
    </div>
@stop