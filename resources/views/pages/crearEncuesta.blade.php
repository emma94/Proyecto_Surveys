@extends("masterPage")

@section("content")
<div class="col-lg-offset-1 col-lg-10">
    <div class="row">
        <div class="well bs-component">
            <form class="form-horizontal">
                <fieldset>
                    <ul id="sortable-with-handles" class="sortable list-group">
                        <legend>Encuesta</legend>
                        <li class="list-group-item">
                            <span class="handle">::</span>
                            <div class="form-group">
                                <label for="pregunta" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="pregunta" placeholder="¿Qué desea preguntar?">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Respuesta</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="handle">::</span>
                            <div class="form-group">
                                <label for="pregunta2" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="pregunta2" placeholder="¿Qué desea preguntar?">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Respuesta</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Si
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="handle">::</span>
                            <div class="form-group">
                                <label for="pregunta3" class="col-lg-2 control-label">Pregunta</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="pregunta3" placeholder="¿Qué desea preguntar?">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textArea2" class="col-lg-2 control-label">Respuesta</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" rows="3" id="textArea2"></textarea>
                                </div>
                            </div>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            $('#sortable-with-handles').sortable({
                handle: '.handle'
            });
        });
    </script>
</div>
<div class="col-lg-1 agregar">
    <img src="/imgs/plus.png">
</div>
@stop

