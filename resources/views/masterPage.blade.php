<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Surveys</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/js/jquery.sortable.js"></script>
    <script src="/js/jquery.bootpag.min.js"></script>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">




</head>
<body>
    <div id="prueba" class="container">
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
                        @if (!Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   Mis encuestas <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/crearNuevaEncuesta"><i class="fa fa-btn fa-plus"></i>Nueva Encuesta</a></li>
                                    <li><a href="/miPerfil#encuestas"><i class="fa fa-btn fa-file-text"></i>Ver Encuestas</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <div id="user-data">
                    <ul class="nav navbar-nav navbar-right">

                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                        <!--<li><a href="{{ url('/register') }}">Registrar</a></li>-->
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombreCompleto }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/miPerfil') }}"><i class="fa fa-btn fa-user"></i>Mi Perfil</a></li>
                                <li><a href="{{ url('/cambioContrasena') }}"><i class="fa fa-btn fa-user-secret"></i>Cambiar contraseña</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                    </div>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar en Surveys">
                        </div>
                        <button type="submit" class="btn btn-success"><img src="/imgs/toolbar_find.png" style="height: 22px;"></button>
                    </form>

                </div>
            </div>
        </nav>

    @yield("content")

    </div>
</body>
</html>
