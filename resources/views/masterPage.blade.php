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

                    <ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Buscar en Surveys">
                            </div>
                            <button type="submit" class="btn btn-success"><img src="/imgs/toolbar_find.png" style="height: 22px;"></button>
                        </form>
                        <li><a href="/iniciarSesion">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    @yield("content")

    </div>
</body>
</html>
