@extends ('layout.app')

@section('content')


    <h1>Create Events</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class = "form-group">
          {{Form::label('title', 'Event Name')}}
          {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Type your event name here'])}}
        </div>

        <div class = "form-group">
          {{Form::label('description', 'Description')}}
          {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Type your event description here'])}}
        </div>

        {{-- <div class = "form-group col">
          {{Form::label('category', 'Discipline')}}
          {{Form::select('category', ['Running' => 'Running', 'Cycling' => 'Cycling', 'Swimming' => 'Swimming'], null, ['placeholder' => 'Pick your discipline...'])}}
        </div> --}}

        <label>Discipline</label>
        <select name="discipline" id="discipline" class="form-control custom-select">
          <option value="Running">Running</option>
          <option value="Cycling">Cycling</option>
          <option value="Swimming">Swimming</option>
        </select>
        
        <h2>Event Location</h2>
        <div class = "form-row">
          <div class = "form-group col">
            {{Form::label('event_address', 'Adress')}}
            {{Form::text('event_address', '', ['class' => 'form-control', 'placeholder' => 'Type your event address here'])}}
          </div>

          <div class = "form-group col">
            {{Form::label('event_city', 'City')}}
            {{Form::text('event_city', '', ['class' => 'form-control', 'placeholder' => 'Type your event city here'])}}
          </div>
        </div>

        <div class = "form-row">
          <div class = "form-group col">
            {{Form::label('event_postcode', 'Postcode')}}
            {{Form::number('event_postcode', '', ['class' => 'form-control', 'placeholder' => 'Type your event Postcode here'])}}
          </div>

          {{-- <div class = "form-group col">
            {{Form::label('event_state', 'State')}}
            {{Form::select('event_state', ['Kuala Lumpur' => 'Kuala Lumpur', 'Selangor' => 'Selangor',
                'Kedah' => 'Kedah', 'Kelantan' => 'Kelantan', 'Johor' => 'Johor', 'Negeri Sembilan' => 'Negeri Sembilan', 'Terengganu' => 'Terengganu',
                'Perlis' => 'Perlis', 'Perak' => 'Perak', 'Pahang' => 'Pahang', 'Melaka' => 'Melaka', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak' ], 
                null, ['placeholder' => 'Pick your state...'])}}
          </div> --}}

          <div class = "form-group col">
            <label>Country</label>
            <select name="event_state" id="event_state" class="form-control custom-select" >
              <option value="Kuala Lumpur">Kuala Lumpur</option>
              <option value="Selangor">Selangor</option>
              <option value="Kedah">Kedah</option>
              <option value="Kelantan">Kelantan</option>
              <option value="Johor">Johor</option>
              <option value="Negeri Sembilan">Negeri Sembilan</option>
              <option value="Terengganu">Terengganu</option>
              <option value="Perlis">Perlis</option>
              <option value="Pahang">Pahang</option>
              <option value="Melaka">Melaka</option>
              <option value="Sabah">Sabah</option>
              <option value="Sarawak">Sarawak</option>
              <option value="Pulau Pinang">Pulau Pinang</option>
              <option value="Perak">Perak</option>
            </select>
          </div>

          {{-- <div class = "form-group col pt-4">
            {{Form::label('event_country', 'Country')}}
            {{Form::select('event_country', ['Malaysia' => 'Malaysia', 'Singapore' => 'Singapore'], null, ['placeholder' => 'Pick your country...'])}}
          </div>
        </div> --}}

        <div class = "form-group col">
          <label>Country</label>
          <select name="event_country" id="event_country" class="form-control custom-select">
            <option value="Malaysia">Malaysia</option>
            <option value="Singapore">Singapore</option>
          </select>
        </div>
      </div>

        <!--Dates Section, category time also needed!--> 

        <h2>Dates</h2>
        <div class = "row">
            <div class = "form-group col">
              {{Form::label('event_date', 'Event Date')}}
              {{Form::date('event_date', '', ['class' => 'form-control'])}}
            </div>

            <div class = "form-group col">
              {{Form::label('event_time', 'Event Time')}}
              {{Form::time('event_time', '', ['class' => 'form-control'])}}
            </div>
          </div>

          <div class = "row">
            <div class = "form-group col">
              {{Form::label('event_enddate', 'Event End Date')}}
              {{Form::date('event_enddate', '', ['class' => 'form-control'])}}
            </div>

            <div class = "form-group col">
              {{Form::label('event_endtime', 'Event End Time')}}
              {{Form::time('event_endtime', '', ['class' => 'form-control'])}}
            </div>
          </div
          >
          <div class = "row">  
            <div class = "form-group col">
              {{Form::label('reg_opendate', 'Registration Open Date')}}
              {{Form::date('reg_opendate', '', ['class' => 'form-control'])}}
            </div>

            <div class = "form-group col">
              {{Form::label('reg_opentime', 'Registration Open Time')}}
              {{Form::time('reg_opentime', '', ['class' => 'form-control'])}}
            </div>
          </div>

          <div class = "row">
            <div class = "form-group col">
              {{Form::label('reg_closedate', 'Registration Close Date')}}
              {{Form::date('reg_closedate', '', ['class' => 'form-control'])}}
            </div>

            <div class = "form-group col">
              {{Form::label('reg_closetime', 'Registration Close Time')}}
              {{Form::time('reg_closetime', '', ['class' => 'form-control'])}}
            </div>
          </div>

          <div class = "form-group">
            {{Form::label('event_waiver', 'Event Waiver')}}
            {{Form::textarea('event_waiver', '', ['class' => 'form-control', 'placeholder' => 'Type your event waiver here'])}}
          </div>

        <!-- Upload image form-->
        <h2>Image Upload</h2>
        <div class = "row d-flex justify-content-around">
          <div class="form-group">
            {{Form::label('event_image', 'Event Image')}}<br>
            {{Form::file('event_image')}}
          </div>
          <div class="form-group">
            {{Form::label('event_shirt', 'Event Shirt')}}<br>
            {{Form::file('event_shirt')}}
          </div>
          <div class="form-group">
            {{Form::label('event_medal', 'Event Medal')}}<br>
            {{Form::file('event_medal')}}
          </div>
        </div>

          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection

