<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Surveys</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery-1.7.1.min.js"></script>
    <script src="/js/jquery.sortable.js"></script>


</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/imgs/logo.png" alt="Logo" href="/"/>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Inicio</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                        <li><a href="/acerca">Acerca de Surveys</a></li>
                        <li><a href="/crearEncuesta">Crear Encuesta</a></li>
                        <li><a href="#">Donaciones</a></li>
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
                            <li><a href="{{ url('/register') }}">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombreCompleto }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
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
