@extends ('layout.app')

@section('content')

    <h1>Events</h1>
    <div class="container">
    @if(count($posts) >0)
        @forelse($posts as $post)
              <div class="card p-1 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-4" style="padding-left: 0px;  padding-right: 0px;">
                        <img src = "/storage/storage/event_images/{{$post->event_image}}"><br><br>
                    </div>  
                        <div class="col">   
                            <div>
                                <h3><a href="posts/{{$post->post_id}}">{{$post->title}} <br> ( {{$post->event_date}}  )</a></h3>
                            </div>
                            <div class="pb-3">
                                <p class="card-text">{{$post->description}}</p>
                            </div>          
                                                                                   
                            <small>This event by {{$post->user->username}}</small>                                                 
                    </div>
                   
                </div> 

            </div>
        
            @empty 
                <h1>There are no posts yet :( </h1>
        @endforelse
            {{$posts->links()}}
    @endif
        </div>
@endsection


