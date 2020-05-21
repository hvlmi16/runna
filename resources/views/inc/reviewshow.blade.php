<div class="content-wrapper">
    <div class="content" id="posts">
        <div class="container">
            <div class="row">

                {{-- Ratings Block --}}

                <div class="post_ratings">
                   {{-- Form Open --}}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="rating_submit_inner">
                        <input id="radio1" type="radio" name="rating" value="5" class="star"/>
                        <label for="radio1">&#9733;</label>
                        <input id="radio2" type="radio" name="rating" value="4" class="star"/>
                        <label for="radio2">&#9733;</label>
                        <input id="radio3" type="radio" name="rating" value="3" class="star"/>
                        <label for="radio3">&#9733;</label>
                        <input id="radio4" type="radio" name="rating" value="2" class="star"/>
                        <label for="radio4">&#9733;</label>
                        <input id="radio5" type="radio" name="rating" value="1" class="star"/>
                        <label for="radio5">&#9733;</label>
                    </div>

                    <div class="form-group">
                        <label for="review">Review:</label>
                        <textarea class="form-control" rows="5" id="review"></textarea>
                      </div>
                   {{-- Form Close--}}
                </div>
            </div>
        </div>
    </div>
</div>

<?php
   $avg = $post->ratings()->avg('rating_count');
   $ov_rating = number_format($avg);   // this is used to convert no from decimal
?>
@if(count($post->ratings) > 1)
   <div class="rating_inner">
      <span class="rating_icon">
         @for($i = 0; $i < $ov_rating; $i++)
            <span class="fa fa-star"></span>
         @endfor
         @for($i = 0; $i < 5 - $ov_rating; $i++)
            <span class="fa fa-star light"></span>
         @endfor
      </span>
      @if($avg)
          <span class="rating_count">{{$avg}}</span>
          <span class="max_rating">{{_('5')}}</span>
      @else
          {{_('No Ratings Yet')}}
      @endif
      <span class="rating_total">{{_('(')}}<span>{{count($post->ratings)}}</span>{{_(' votes)')}}</span>
   </div>
@endif
@endsection

