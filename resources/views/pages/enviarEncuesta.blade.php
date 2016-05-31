@extends("masterPageMeta")

@section("content")
    <div class="col-lg-9">
        <div class="row">
            <div class="well bs-component">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Enviar encuesta</legend>
                        <div class="form-group">
                            <label for="inputTitulo" class="col-lg-2 control-label">Link de la encuesta</label>
                            <div class="col-lg-9">
                                <input type="text" name="titulo" class="form-control" id="inputTitulo" value="{{$link}}">
                            </div>
                        </div>
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href={{$link}}&layout=button&mobile_iframe=true&width=80&height=20&appId" width="80" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
@stop