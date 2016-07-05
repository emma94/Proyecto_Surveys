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
                <p>Algunos correos tienen un formato incorrecto y no serán tomados en cuenta para el envío de la
                    encuesta.
                    <br><br>¿Desea continuar de todos modos?</p>
            </div>
            <div class="modal-footer">
                <button onclick="document.getElementById('modalAlert').style.display = 'none'" type="button"
                        class="btn btn-default" data-dismiss="modal">Volver
                </button>
                <button onclick="return hacerSubmit()" type="button" class="btn btn-primary">Continuar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" role="dialog" id="modalAlertError">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button onclick="document.getElementById('modalAlertError').style.display = 'none'" type="button"
                        class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>Debe ingresar algún correo válido</p>
            </div>
            <div class="modal-footer">
                <button onclick="document.getElementById('modalAlertError').style.display = 'none'" type="button"
                        class="btn btn-default" data-dismiss="modal">Volver
                </button>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="row">
        <div class="well bs-component">
            <fieldset>
                <legend>Enviar encuesta</legend>
                <div class="form-group col-md-offset-2">
                    <label for="inputTitulo">Link de la encuesta:</label>

                    <div class="col-lg-9 col-md-8 col-sm-8 input-group" id="inputTitulo">
                        <input type="text" name="titulo" class="form-control " id="inputLink" value="{{$link}}"
                               readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="copy-button" data-toggle="tooltip"
                                            data-placement="button"
                                            title="Copiar al portapapeles">
                                        Copiar
                                    </button>
                                </span>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-pills tab-compartir" id="myTab">

                    <li class="active"><a href="#social" data-toggle="tab" aria-expanded="true"> <i
                                class="fa fa-btn fa-facebook"></i>Compartir por Facebook</a></li>
                    <li class=""><a href="#correo" data-toggle="tab" aria-expanded="false"><i
                                class="fa fa-btn fa-envelope"></i>Enviar por correo electrónico</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="social">
                        <div id="imagenFace">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('/crearEncuesta/guardar') }}">
                            </form>
                        </div>
                        <div>
                            <br>

                            <div class="col-lg-8 col-lg-offset-4">
                                <a href="javascript: void(0);"
                                   onclick="window.open('http://www.facebook.com/sharer.php?u={{$link}}','Compartir Facebook', 'toolbar=0, status=0, width=650, height=450');"
                                   class="btn btn-primary ventanita"><i
                                        class="fa fa-btn fa-facebook"></i>Compartir en Facebook</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="correo">
                        <div class="col-lg-8 col-lg-offset-2">
                            <br>
                            <form id="formCorreos" onsubmit="return validacion()" class="form-horizontal" role="form"
                                  method="POST" action="{{ url('/enviarEncuesta/correo') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" class="form-control " id="inputLink"
                                       value="{{ app('request')->input('id') }}" readonly>
                                <div class="row">
                                    @if(Session::has('message'))
                                    <div class="alert alert-success fade in col-md-5">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>{{Session::get('message') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="divtext">Correo(s) electrónico(s):</label>

                                    <div id="divtext">
                                        <div id="zona-correo">
                                            <input autocomplete=off type="email" id="area-correo" size="2"
                                                   maxlength="72">

                                        </div>
                                        <input type="hidden" id="bad-mail" value="0">
                                        <input type="hidden" id="good-mail" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="in-asunto">Asunto:</label>
                                    <input type="text" id="in-asunto" class="form-control" name="asunto">
                                </div>
                                <div class="form-group">
                                    <label for="in-msj">Mensaje*:</label>
                                    <textarea name="mensaje" class="ta-msj form-control"></textarea>

                                    <div id="inclusion-link">*No agregar el link de la encuesta ya que se incluira
                                        automaticamente despues del mensaje.
                                    </div>

                                </div>
                                <input type="hidden" name="link" value="{{$link}}">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-envelope-o"></i>Enviar encuesta
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="https://rawgit.com/flatlogic/bootstrap-tabcollapse/master/bootstrap-tabcollapse.js"></script>

<script type="text/javascript">
    $('#myTab').tabCollapse();
</script>
<script>
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>
<script>
    function validacion() {
        var buenos = parseInt(document.getElementById("good-mail").value);
        if (buenos > 0) {
            var malos = document.getElementById("bad-mail").value;
            if (malos > 0) {
                document.getElementById("modalAlert").style.display = "block"
                return false;
            }
        }
        else {
            document.getElementById("modalAlertError").style.display = "block"
            return false;
        }
    }
</script>
<script>
    function hacerSubmit() {
        document.getElementById("formCorreos").submit();
    }
</script>
<script>
    $(document).ready(function () {
        // Initialize the tooltip.
        $('#copy-button').tooltip();

        // When the copy button is clicked, select the value of the text box, attempt
        // to execute the copy command, and trigger event to update tooltip message
        // to indicate whether the text was successfully copied.
        $('#copy-button').bind('click', function () {
            var input = document.querySelector('#inputLink');
            input.setSelectionRange(0, input.value.length + 1);
            try {
                var success = document.execCommand('copy');

                $('#inputLink').select();
                if (success) {
                    $('#copy-button').trigger('copied', ['Copiado!']);
                } else {
                    $('#copy-button').trigger('copied', ['Seleccionar texto para copiar']);
                }
            } catch (err) {
                $('#copy-button').trigger('copied', ['Seleccionar texto para copiar']);
            }
        });

        // Handler for updating the tooltip message.
        $('#copy-button').bind('copied', function (event, message) {
            $(this).attr('title', message)
                .tooltip('fixTitle')
                .tooltip('show')
                .attr('title', "Copiar al portapapeles")
                .tooltip('fixTitle');
        });
    });
    $("#inputLink").on("click", function () {
        $(this).select();
    });
</script>
<script type="text/javascript">

    $(document).on('click', '#boton-eliminar', function () {
        var idElemento = $(this).parent().attr('id');
        $(this).parent().remove();
        if (idElemento != 1) {
            var correosMalosBye = parseInt(document.getElementById("bad-mail").value);
            correosMalosBye = (correosMalosBye - 1);
            $("#bad-mail").val("");
            $("#bad-mail").val(correosMalosBye);
        } else {
            var correosBuenos = parseInt(document.getElementById("good-mail").value);
            correosBuenos = (correosBuenos - 1);
            $("#good-mail").val("");
            $("#good-mail").val(correosBuenos);
        }

    });


</script>

<script type="text/javascript">
    function validarCorreeo(correo) {
        var pattern = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
        return pattern.test(correo);
    }

    function agregarCorreo(valor) {
        if (valor.trim() != "") {

            if (validarCorreeo(valor) == true) {
                var divi = '<div  class="redimensionar" id="1"><button type="button" class="close" id="boton-eliminar" >&times;</button> <span id="texto-span">' + valor + '</span><input type="hidden" value="' + valor + '" name="correo[]"> </div>';
                var correosBuenos = parseInt(document.getElementById("good-mail").value);
                correosBuenos = (correosBuenos + 1);
                $("#area-correo").before(divi);
                $("#area-correo").val(null);
                $("#good-mail").val("");
                $("#good-mail").val(correosBuenos);
                $("#area-correo").attr('size', 2);

            } else {
                var divi = '<div  class="redimensionar" id="0"><button type="button" class="close" id="boton-eliminar" >&times;</button> <span id="error-span">' + valor + '</span> </div>';
                var correosMalos = parseInt(document.getElementById("bad-mail").value);
                correosMalos = (correosMalos + 1);
                $("#area-correo").before(divi);
                $("#bad-mail").val("");
                $("#bad-mail").val(correosMalos);
                $("#area-correo").val(null);
                $("#area-correo").attr('size', 2);

            }
        }
    }

    $("#area-correo").keydown(function (event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            var valor = $("#area-correo").val();
            agregarCorreo(valor);
        }
        if (event.keyCode == 8) {
            var valor = $("#area-correo").val();
            if (valor.length == 0) {
                $("#zona-correo").children("div[class=redimensionar]:last").remove();

            }
        }

    });


    $("#area-correo").bind("paste", function (e) {
        // access the clipboard using the api
        var pastedData = e.originalEvent.clipboardData.getData('text');
        //alert(pastedData);
        e.preventDefault();
        var lista = new Array();

        var datosCorreo = pastedData.replace(/\n/g, " ");
        lista = datosCorreo.split(" ");
        for (i = 0; i < lista.length; i++) {

            agregarCorreo(lista[i].trim());
        }
    });
</script>
<script type="text/javascript">

    $(document).on('click', '#divtext', function () {
        $('#area-correo').focus();

    });

    function resizeInput() {
        if ($(this).val().length > 2) {
            $(this).attr('size', $(this).val().length + 1);
        } else {
            $(this).attr('size', 2);
        }
    }
    $('#area-correo')
        // event handler
        .keyup(resizeInput)
        // resize on page load
        .each(resizeInput);
</script>
<script>
    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })
</script>


@stop