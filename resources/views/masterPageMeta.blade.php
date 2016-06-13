<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Surveys</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url" content="{{$link}}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$nombre}}" />
    <meta property="og:description" content="Ayudanos completando esta encuesta" />
    <meta property="og:image" content="http://previews.123rf.com/images/gigisomplak/gigisomplak1405/gigisomplak140500047/29198252-dibujo-dibujar-a-mano-la-nota-en-blanco-y-pluma-Foto-de-archivo.jpg" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="442" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="/js/jquery.sortable.js"></script>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">




</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/imgs/logo.png" alt="Logo" href="/"/>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Inicio</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/acerca">Acerca de Surveys</a></li>
                        <li><a href="/crearNuevaEncuesta">Nueva Encuesta</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar en Surveys">
                        </div>
                        <button type="submit" class="btn btn-success"><img src="/imgs/toolbar_find.png" style="height: 22px;"></button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">

                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Iniciar sesion</a></li>
                        <!--<li><a href="{{ url('/register') }}">Registrar</a></li>-->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombreCompleto }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/miPerfil') }}"><i class="fa fa-btn fa-user"></i>Mi Perfil</a></li>
                                    <li><a href="{{ url('/cambioContrasena') }}"><i class="fa fa-btn fa-lock"></i>Cambiar contraseña</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    @yield("content")

    </div>
</body>
</html>
