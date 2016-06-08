@foreach(explode("\r\n",$msj) as $texto )
    {{$texto}}
    <br/>
@endforeach
<br/><a href="{{ $link  }}"> {{ $link }} </a>
