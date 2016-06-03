@extends("masterPageMeta")

@section("content")
    <div class="col-lg-11">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Enviar encuesta</legend>
                        <div class="form-group">
                            <label for="inputTitulo" class="col-lg-2 control-label">Link de la encuesta</label>
                            <div class="col-lg-9 input-group">
                                <input type="text" name="titulo" class="form-control " id="inputLink" value="{{$link}}" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="copy-button" data-toggle="tooltip" data-placement="button"
                                            title="Copiar al portapapeles">
                                     Copiar
                                    </button>
                                </span>
                            </div>
                        </div>
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href={{$link}}&layout=button&mobile_iframe=true&width=80&height=20&appId" width="80" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Initialize the tooltip.
            $('#copy-button').tooltip();

            // When the copy button is clicked, select the value of the text box, attempt
            // to execute the copy command, and trigger event to update tooltip message
            // to indicate whether the text was successfully copied.
            $('#copy-button').bind('click', function() {
                var input = document.querySelector('#inputLink');
                input.setSelectionRange(0, input.value.length + 1);
                try {
                    var success = document.execCommand('copy');
                    if (success) {
                        $('#copy-button').trigger('copied', ['Copiado!']);
                    } else {
                        $('#copy-button').trigger('copied', ['Copiar con Ctrl-c']);
                    }
                } catch (err) {
                    $('#copy-button').trigger('copied', ['Copiar con Ctrl-c']);
                }
            });

            // Handler for updating the tooltip message.
            $('#copy-button').bind('copied', function(event, message) {
                $(this).attr('title', message)
                        .tooltip('fixTitle')
                        .tooltip('show')
                        .attr('title', "Copiar al portapapeles")
                        .tooltip('fixTitle');
            });
        });

    </script>
@stop