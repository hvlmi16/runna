@extends ('layout.app')

@section('content')

{!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<input type="text" name="post_id" value="{{ $post_id ?? '' }}" hidden>

    <div class = "form-group">
        {{Form::label('cat_name', 'Category Name')}}
        {{Form::text('cat_name', '', ['class' => 'form-control', 'placeholder' => 'Type your category name here'])}}
    </div>
    
    <div class = "form-group">
        {{Form::label('cat_desc', 'Category Description')}}
        {{Form::textArea('cat_desc', '', ['class' => 'form-control', 'placeholder' => 'Type your category description here'])}}
    </div>

    <div class = "form-group">
        {{Form::label('cat_fee', 'Entry Fee')}}
        {{Form::number('cat_fee', '', ['class' => 'form-control', 'placeholder' => 'Type your category fee here'])}}
    </div>

    <div class = "form-group">
        {{Form::label('cat_distance', 'Distance')}}
        {{Form::number('cat_distance', '', ['class' => 'form-control', 'placeholder' => 'Type your category distance here'])}}
    </div>

    <div class = "form-group">
        {{Form::label('cat_starttime', 'Start Time')}}
        {{Form::time('cat_starttime', '', ['class' => 'form-control', 'placeholder' => 'Type your category start time here'])}}
    </div>

    <div class = "form-group">
        {{Form::label('cat_limit', 'Field Limit')}}
        {{Form::number('cat_limit', '', ['class' => 'form-control', 'placeholder' => 'Type your category field limit here'])}}
    </div>

    <div class = "form-group">
        {{Form::label('cat_prize', 'Category Prize')}}
        {{Form::text('cat_prize', '', ['class' => 'form-control', 'placeholder' => 'Type your category prize here'])}}
    </div>   

    <label>Gender</label>
    <select name="cat_gender" id="cat_gender" class="form-control custom-select">
        <option value="1">Male</option>
        <option value="0">Female</option>
    </select>

{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection