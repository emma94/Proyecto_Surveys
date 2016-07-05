@extends("masterPage")

@section("content")
<div class="modal" id="modalAlert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button onclick="document.getElementById('modalAlert').style.display = 'none'" type="button"
                        class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Advertencia</h4>
            </div>
            <div class="modal-body">
                <p>Esta encuesta se encuentra en estado "Iniciada", por lo que si desea editarla se perderan los datos recopilados hasta el momento.
                    <br><br>¿Desea continuar de todos modos?</p>
            </div>
            <div class="modal-footer">
                <button onclick="document.getElementById('modalAlert').style.display = 'none'" type="button"
                        class="btn btn-default" data-dismiss="modal">Volver
                </button>
                <a onclick="return estadoEditar()" class="btn btn-primary">Continuar</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row">
        <div class="well bs-component">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('miperfil/updData') }}">
                <fieldset>
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs nav-pills tab-compartir" id="myTab">
                            <li class="active"><a href="#miperfil" data-toggle="tab" aria-expanded="true">
                                    <i class="fa fa-btn fa-user"></i>Mi Perfil</a></li>
                            <li class=""><a href="#encuestas" data-toggle="tab" aria-expanded="false">
                                    <i class="fa fa-btn fa-file-text"></i>Mis Encuestas</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="miperfil">
                                <div>
                                    <br/>
                                    <legend>Datos Personales</legend>

                                    {!! csrf_field() !!}
                                    <div class="col-lg-12">
                                        <div
                                            class="col-lg-11 form-group{{ $errors->has('nombreCompleto') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label">Nombre completo</label>

                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nombreCompleto"
                                                       value="{{ $usuario->nombreCompleto }}">

                                                @if ($errors->has('nombreCompleto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombreCompleto') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div
                                            class="col-lg-11 form-group{{ $errors->has('carne') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label">Carné</label>

                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="carne"
                                                       value="{{$usuario->carne}}">

                                                @if ($errors->has('carne'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carne') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div
                                            class="col-lg-11 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label">Correo Electrónico</label>

                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="email"
                                                       value="{{ $usuario->email }}">

                                                @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <br>
                                        @if (strlen($msjExito)>0)
                                        <div class="alert alert-success fade in col-md-5">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Éxito!</strong> {{$msjExito}}
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="col-md-offset-10">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-user"></i>Actualizar perfil
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
                                        <li class="list-group-item active" style="min-height: 60px;">
                                            <span class="badge" style="margin-top: 10px;">Cantidad de Resultados</span>

                                            <div class="col-lg-10">
                                                <h5 style="margin-top: 10px;">Título de la Encuesta</h5>
                                            </div>
                                        </li>
                                        @foreach ($usuario->encuestas as $encuesta)
                                        <li class="list-group-item">
                                            <span class="badge" style="margin-top: 10px;">{{ $encuesta->resultados->count() }}</span>

                                            <div class="col-lg-5">
                                                @if (strlen($encuesta->titulo) > 50)
                                                <h5><p data-toggle="tooltip" title="{{ $encuesta->titulo }}">{{
                                                        substr(strip_tags($encuesta->titulo), 0, 50) }}...</p></h5>
                                                @else
                                                <h5>{{ $encuesta->titulo }}</h5>
                                                @endif
                                            </div>
                                            <input type="hidden" id="encuesta" value=""/>
                                            @if ($encuesta->idEstado === 1 )
                                            <a href="/crearEncuesta?id={{$encuesta->id}}" class="btn  btn-info">
                                                <i class="fa fa-btn fa-pencil"> Editar</i>
                                            </a>
                                            @elseif ($encuesta->idEstado === 2)
                                            <a onclick="return comprobacion({{$encuesta->id}})" class="btn  btn-info">
                                                <i class="fa fa-btn fa-pencil"> Editar</i>
                                            </a>
                                            @else
                                            <a disabled="true" class="btn  btn-info">
                                                <i class="fa fa-btn fa-pencil"> Editar</i>
                                            </a>
                                            @endif
                                            @if ($encuesta->idEstado === 2)
                                            <a href="/enviarEncuesta?id={{ $encuesta->id }}" class="btn  btn-success">
                                                <i class="fa fa-btn fa-share"> Compartir</i>
                                            </a>
                                            @else
                                            <a href="/enviarEncuesta?id={{ $encuesta->id }}" class="btn  btn-success"
                                               disabled="true">
                                                <i class="fa fa-btn fa-share"> Compartir</i>
                                            </a>
                                            @endif
                                            @if ($encuesta->idEstado === 2 or $encuesta->idEstado === 3)
                                            <a href="/resultados/{{ $encuesta->id }}" class="btn  btn-warning">
                                                <i class="fa fa-btn fa-pie-chart"> Resultados</i>
                                            </a>
                                            @endif
                                            @if ($encuesta->idEstado === 1)
                                            <a href="/miPerfil/{{ $encuesta->id }}/cambiarEstado"
                                               class="btn  btn-primary">
                                                <i class="fa fa-btn fa-toggle-on"> Iniciar</i>
                                            </a>
                                            @elseif ($encuesta->idEstado === 2)
                                            <a href="/miPerfil/{{ $encuesta->id }}/cambiarEstado"
                                               class="btn  btn-danger">
                                                <i class="fa fa-btn fa-toggle-off"> Terminar</i>
                                            </a>
                                            @else
                                            <a href="/miPerfil/{{ $encuesta->id }}/cambiarEstado"
                                               class="btn  btn-success" disabled="">
                                                <i class="fa fa-btn fa-ban"> Finalizada</i>
                                            </a>
                                            @endif
                                            @if ($encuesta->preguntas->count() != 0)
                                            <a href="/printSurv?id={{ $encuesta->id}}" class="btn  btn-default" target="_blank">
                                                <i class="fa fa-btn fa-file-pdf-o" style="margin-left: 5px;"> PDF</i>
                                            </a>
                                            @else
                                            <a href="/printSurv?id={{ $encuesta->id}}" disabled="true" class="btn  btn-default" target="_blank">
                                                <i class="fa fa-btn fa-file-pdf-o" style="margin-left: 5px;"> PDF</i>
                                            </a>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript"
        src="https://rawgit.com/flatlogic/bootstrap-tabcollapse/master/bootstrap-tabcollapse.js"></script>

<script type="text/javascript">
    $('#myTab').tabCollapse();
</script>
<script>
    function estadoEditar() {
        var id = $(document.getElementById('encuesta')).val();
        document.location.href= "/crearEncuesta?id=" + id;
    }
</script>
<script>
    function comprobacion(id) {
        $(document.getElementById('encuesta')).val(id);
        document.getElementById('modalAlert').style.display = "block";
    }
</script>
<script>

    /* $(document).ready(function(){
     $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
     localStorage.setItem('activeTab', $(e.target).attr('href'));
     });
     var activeTab = localStorage.getItem('activeTab');
     if(activeTab){
     $('#myTab a[href="' + activeTab + '"]').tab('show');
     }
     });*/
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });
</script>
@stop