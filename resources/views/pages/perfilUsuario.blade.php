@extends("masterPage")

@section("content")
    <div class="col-lg-offset-2 col-lg-8">
        <div class="row">
            <div class="well bs-component">
                {!! Form::model($usuario,['url' => 'visitante/addnewUser']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre Completo:',['class' => "col-md-4 control-label"]) !!}
                    <div class="col-md-6">
                        {!! Form::text('nombreCompleto', null, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('carne', 'Carne:',['class' => "col-md-4 control-label"]) !!}
                    <div class="col-md-6">
                        {!! Form::text('carne', null, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Correo Electronico:',['class' => "col-md-4 control-label"]) !!}
                    <div class="col-md-6">
                        {!! Form::email('email', null, ['class' => "form-control", 'required' => "required"]) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('password', 'Password:',['class' => "col-md-4 control-label"]) !!}
                    <div class="col-md-6">
                        {!! Form::password('password', ['class' => "form-control", 'required' => "required"]) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmar password:',['class' => "col-md-4 control-label"]) !!}
                    <div class="col-md-6">
                        {!! Form::password('password_confirmation', ['class' => "form-control", 'required' => "required"]) !!}
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-3 col-md-offset-5">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('username', null, ['class' => "form-control", 'required' => "required",'style' => 'visibility: hidden']) !!}
                    {!! Form::text('id', null, ['class' => "form-control", 'required' => "required",'style' => 'visibility: hidden']) !!}

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
