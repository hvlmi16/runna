@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                <a href="/profiles/show/{{Auth::user()->profile->id}}" class = 'btn btn-info float-right'>View Profile</a>
            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @if(Auth::user()->hasRole('eventDirector')) 
                   @can('create', App\Post::class)
                        <a href = "posts/create" class = "btn btn-primary float-right">Create Event</a>
                   @endcan

                    <h3>Your Events</h3>
                    @if(count($posts) > 0)
                        <table class = "table table-striped">
                            <tr>
                                <th><h3>Title</h3></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{$post->post_id}}">{{$post->title}}</a></td>
                                    <td><a href="/posts/{{$post->post_id}}/edit" class = 'btn btn-default'>Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' =>['PostsController@destroy', $post->post_id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                    <td><a href="post/registrations/{{$post->post_id}}" class = 'btn btn-default'>Registrants</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You Have No Post Yet</p>
                    @endif
                @endif

                {{-- Participant Dashboard NEED TO BE CHECK--}}  

                    @if(Auth::user()->hasRole('participant')) 
                        <h3>Your Registered Events</h3>
                       
                        @if(count($registrations) > 0 ?? '')
                            <table class = "table table-striped">
                                <tr>
                                    <th><h3>No</h3></th>
                                    <th>Title</th>
                                    
                                </tr>
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="/posts/{{$registration->post_id}}">
                                            {{$registration->title}}
                                        </a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                        <p>You Are Not Registered on Any Event</p>
                    @endif
                    @endif

                {{-- @else
                
                @foreach($registrations as $registration)
                    <h3>Your registered events</h3>
                    <table class = "table table-striped">
                        <tr>
                            <th><h3>Title</h3></th>
                            <th>{{$registration->id}}</th>
                            <th></th>
                        </tr>
                    </table>
                @endforeach --}}

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
