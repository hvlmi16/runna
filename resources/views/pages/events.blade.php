@extends('layout.app')

@section('content')
    <h1>{{$title}}</h1>

    @if(count($events) > 0)
        <ul class = "list-group">

            @foreach($events as $event)
                <li class ="list-group-item">{{$event}}</li>
            @endforeach

        </ul>
    @endif
    
@endsection
