@extends ('layout.app')

@section('content')
    
    <h1>Profiles</h1>
    {!! Form::open(['action' => 'ProfilesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <input type="text" name="user_id" value="{{ $user_id ?? '' }}" hidden>

        <div class = "form-group">
          {{Form::label('firstName', 'First Name')}}
          {{Form::text('firstName', '', ['class' => 'form-control', 'placeholder' => 'Type your First Name here'])}}
        </div>

        <div class = "form-group">
          {{Form::label('lastName', 'Last Name')}}
          {{Form::text('lastName', '', ['class' => 'form-control', 'placeholder' => 'Type your Last Name here'])}}
        </div>

        <div class = "form-row">
          <div class = "form-group col">
              {{Form::label('contactNumber', 'Phone Number')}}
              {{Form::text('contactNumber', '', ['class' => 'form-control', 'placeholder' => 'Type your phone number here'])}}
          </div>

          @if(Auth::user()->hasRole('participant'))
            <div class = "form-group col">
            <label>Gender</label>
              <select name="p_gender" id="p_gender" class="form-control custom-select">
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </div>
          @endif

          </div>
        
        <h2>Address</h2>
        <div class = "form-row">
          <div class = "form-group col">
            {{Form::label('address', 'Adress')}}
            {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Type your event address here'])}}
          </div>

          <div class = "form-group col">
            {{Form::label('city', 'City')}}
            {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Type your event city here'])}}
          </div>
        </div>

        <div class = "form-row">
          <div class = "form-group col">
            {{Form::label('postcode', 'Postcode')}}
            {{Form::number('postcode', '', ['class' => 'form-control', 'placeholder' => 'Type your event Postcode here'])}}
          </div>

          <div class = "form-group col">
            <label>State</label>
            <select name="state" id="state" class="form-control custom-select" >
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

          <div class = "form-group col">
            <label>Country</label>
            <select name="country" id="country" class="form-control custom-select">
              <option value="Malaysia">Malaysia</option>
              <option value="Singapore">Singapore</option>
            </select>
          </div>

        </div>

        <!--Dates Section--> 
        
        @if(Auth::user()->hasRole('participant'))
          <h2>Dates</h2>
          <div class = "row">
              <div class = "form-group col">
                {{Form::label('p_dob', 'Date of Birth')}}
                {{Form::date('p_dob', '', ['class' => 'form-control'])}}
              </div>
            </div>

          {{-- Emergency Contact Section --}}
          <h2>Emergency Contact</h2>
          <div class = "form-row">    
              <div class = "form-group col">
                  {{Form::label('p_emergencyName', 'Emergency Contact Name')}}
                  {{Form::text('p_emergencyName', '', ['class' => 'form-control', 'placeholder' => 'Type your Last Name here'])}}
              </div>

                
              <div class = "form-group col">
                    {{Form::label('p_emergencyContactNumber', 'Emergency Contact Number')}}
                    {{Form::text('p_emergencyContactNumber', '', ['class' => 'form-control', 'placeholder' => 'Type your event Postcode here'])}}
              </div>
          </div>
          
            <label>Shirt Size</label>
            <select name="p_shirtSize" id="p_shirtSize" class="form-control custom-select">
              <option value="">Choose your shirt size</option>
              <option value="XXS">XXS</option>
              <option value="XS">XS</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
            </select>
         
        @endif
        
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection


