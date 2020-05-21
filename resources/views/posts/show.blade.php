@extends ('layout.app')

@section('content')
    <a  href ="/posts" class="btn btn-outline-secondary p-1 mt-3 mb-3">Back</a>
    
    	<!-- This row below ensure only authorize people can see the button edit & delete-->
    
        @if(!Auth::guest())
		@if(Auth::user()->hasRole('eventDirector')) {{-- Only user with same user_id post can edit & delete --}}
              <a href ="/posts/{{$post->post_id}}/edit" class = "btn btn-secondary float-right px-4 my-2">Edit</a>
            
            {!!Form::open(['action' =>['PostsController@destroy', $post->post_id], 'method' => 'POST', 'class' => 'float-right px-4 py-2'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif 
	@endif
	 
@foreach($post->categories as $category)
	<div class="jumbotron jumbotron-fluid text-center">
		<h1 class="display-4">{{$post->title}}</h1>
		<p class="lead">{{$post->description}}</p>
		<h5>Discipline : {{$post->discipline}} | Entry Fee : RM {{$category->cat_fee}}</h5>
	</div>
	
		<div class="row s_product_inner">
			<div class="col-sm-6">
				
					<div class="figure">
						<img class="figure-img img-fluid rounded" src = "../storage/storage/event_images/{{$post->event_image}}">
					</div>
					<h4>Shirt Photo</h4>
					<div class="figure">
						<img class="figure-img img-fluid rounded" src="../storage/storage/event_shirts/{{$post->event_shirt}}" alt="">
					</div>
					<h4>Medal Photo</h4>
					<div class="figure">
						<img class="figure-img img-fluid rounded" src="../storage/storage/event_medals/{{$post->event_medal}}">
					</div>	
				
			</div>
				<div class="col-sm-5 offset-sm-1">
					<div class="s_product_text">
						<ul class="list">
							<li><a class="active" ><span>Distance</span> : {{$category->cat_distance}} km</a></li> 
							<li><a ><span>Limit</span> : {{$category->cat_limit}} pax</a></li>
							<li><a ><span>Grand Prize</span> : RM {{$category->cat_prize}} </a></li>
						</ul>
						<p>{{$post->description}}</p>
				@if(!Auth::guest())
					@if(Auth::user()->hasRole('participant'))
						<div class="card_area d-flex align-items-center">
						<a  href ="{{ route('register-event', [$post->post_id]) }}" class="btn btn-primary p-1 mt-3 mb-3 mr-3">Add to Cart</a>
						{{-- <a  href ="{{ route('add-to-cart', [$post->post_id]) }}" class="btn btn-primary p-1 mt-3 mb-3 mr-3">Add to Cart</a> --}}
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					@endif
					</div>
				@endif
				</div>
			</div>
		</div>
	

	<br><br>
	
<div class="row text-center justify-content-center">
	@include('inc.tabshow')
</div>

<div class="container">
<div class="row">
	<div class="col-md-12">
		<form action="{{ route('store-rating') }}" method="post">	

			@csrf

		<input type="hidden" name="post_id" value="{{$post->post_id}}">
			<div class="rating_submit_inner">
				<input id="radio1" type="radio" name="rating" value="1" class="star"/>
				<label for="radio1">&#9733;</label>
				<input id="radio2" type="radio" name="rating" value="2" class="star"/>
				<label for="radio2">&#9733;</label>
				<input id="radio3" type="radio" name="rating" value="3" class="star"/>
				<label for="radio3">&#9733;</label>
				<input id="radio4" type="radio" name="rating" value="4" class="star"/>
				<label for="radio4">&#9733;</label>
				<input id="radio5" type="radio" name="rating" value="5" class="star"/>
				<label for="radio5">&#9733;</label>
			</div>

			<div class="form-group">
				<label for="review">Review:</label>
				<textarea name="review" class="form-control" rows="1" id="review"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
<div class="container">
<table class="table table-bordered">
	@if($post->ratings->isNotEmpty())
	<tr>
		<th>Rating</th>
		<th>Review</th>
	</tr>
		@foreach($post->ratings as $rating)
			<tr>
				<td>{{$rating->rating}} Star</td>
				<td>{{$rating->review}}</td>
			</tr>		
		@endforeach
	@endif
</table>
</div>
@endforeach 
@endsection 

