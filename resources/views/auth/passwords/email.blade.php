@extends("masterPage")

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reestablecer contraseña</div>
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success fade in" id="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('status') }}
                    </div>
                    <script type="text/javascript">
                        $("#alert").fadeTo(5000, 500).slideUp(500, function () {
                            $("#alert").alert('close');
                        });
                    </script>
                    @endif
                    <script type="text/javascript">
                        $("#alert").fadeTo(5000, 500).slideUp(500, function () {
                            $("#alert").alert('close');
                        });
                    </script>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('carne') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Carné:</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" name="carne" value="{{ old('carne') }}">

                                @if ($errors->has('carne'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('carne') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary center-block">
                                    <i class="fa fa-btn fa-envelope"></i>Enviar solicitud
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
