@extends('masterPage')

@section('content')
    <!--<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 400px; width: 800px">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/imgs/acerca1.jpg" alt="Acerca 1" width="100%"">
            </div>

            <div class="item">
                <img src="/imgs/acerca2.jpg" alt="Acerca 2" width="100%">
            </div>

            <div class="item">
                <img src="/imgs/acerca3.jpg" alt="Acerca 3" width="100%">
            </div>

        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div> -->

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/imgs/acerca3.jpg" alt="...">
            <div class="carousel-caption">
                <h2>Crea encuestas fácilmente</h2>
            </div>
        </div>
        <div class="item">
            <img src="/imgs/acerca2.jpg" alt="...">
            <div class="carousel-caption">
                <h2>Comparte las encuestas que creaste</h2>
            </div>
        </div>
        <div class="item">
            <img src="/imgs/acerca1.jpg" alt="...">
            <div class="carousel-caption">
                <h2>Busca encuestas ya realizadas</h2>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

    <div id="footer">
        <p>® BEYL SOLUTIONS 2016</p>
    </div>

@stop
