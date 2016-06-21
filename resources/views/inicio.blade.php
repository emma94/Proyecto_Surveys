@extends('masterPage')

@section('content')
    @if (!Auth::guest())
        <div>
            <img src="/imgs/info2.png" alt="Info" style="width: 1140px;">
        </div>
    @else
        <div>
            <img src="/imgs/info.png" alt="Info" style="width: 1140px;">
        </div>
    @endif
@stop
