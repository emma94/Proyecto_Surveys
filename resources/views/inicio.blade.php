@extends('masterPage')

@section('content')
    @if (!Auth::guest())
        <div>
            <img src="/imgs/info2.png" alt="Info" style="width: 100%;">
        </div>
    @else
        <div>
            <img src="/imgs/info.png" alt="Info" style="width: 100%;">
        </div>
    @endif
@stop
