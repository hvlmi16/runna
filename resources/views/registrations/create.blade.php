@extends ('layout.app')

@section('content')
    
    <h1>Register Event</h1>
    {!! Form::open(['action' => 'RegistrationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <input type="text" name="user_id" value="{{ $user_id ?? '' }}" hidden>

        <div class = "form-group">
          {{Form::label('p_firstName', 'First Name')}}
          {{Form::text('p_firstName', '', ['class' => 'form-control', 'placeholder' => 'Type your First Name here'])}}
        </div>

        <div class = "form-group">
          {{Form::label('p_lastName', 'Last Name')}}
          {{Form::text('p_lastName', '', ['class' => 'form-control', 'placeholder' => 'Type your Last Name here'])}}
        </div>

        <div class = "form-row">
          <div class = "form-group col">
              {{Form::label('p_contNum', 'Phone Number')}}
              {{Form::text('p_contNum', '', ['class' => 'form-control', 'placeholder' => 'Type your phone number here'])}}
          </div>

            <div class = "form-group col">
              <label>Shirt Size</label>
              <select name="p_shirtSize" id="p_shirtSize" class="form-control custom-select">
                <option value="">Choose your shirt size</option>
                <option value="xxs">XXS</option>
                <option value="xs">XS</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
                <option value="xxl">XXL</option>
              </select>
            </div>

            <div class = "form-group col">
            <label>Gender</label>
              <select name="p_gender" id="p_gender" class="form-control custom-select">
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </div>

          </div>
        
        <h2>Participant Address</h2>
        <div class = "form-row">
          <div class = "form-group col">
            {{Form::label('p_address', 'Adress')}}
            {{Form::text('p_address', '', ['class' => 'form-control', 'placeholder' => 'Type your event address here'])}}
          </div>

          <div class = "form-group col">
            {{Form::label('p_city', 'City')}}
            {{Form::text('p_city', '', ['class' => 'form-control', 'placeholder' => 'Type your event city here'])}}
          </div>
        </div>

        <div class = "form-row">
          <div class = "form-group col">
            {{Form::label('p_postcode', 'Postcode')}}
            {{Form::number('p_postcode', '', ['class' => 'form-control', 'placeholder' => 'Type your event Postcode here'])}}
          </div>

          <div class = "form-group col">
            <label>Country</label>
            <select name="p_state" id="p_state" class="form-control custom-select" >
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
            <select name="p_country" id="p_country" class="form-control custom-select">
              <option value="Malaysia">Malaysia</option>
              <option value="Singapore">Singapore</option>
            </select>
          </div>

        </div>

        <!--Dates Section--> 

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
                {{Form::label('p_emgName', 'Emergency Contact Name')}}
                {{Form::text('p_emgName', '', ['class' => 'form-control', 'placeholder' => 'Type your Last Name here'])}}
            </div>

              
            <div class = "form-group col">
                  {{Form::label('p_emgContNum', 'Emergency Contact Number')}}
                  {{Form::text('p_emgContNum', '', ['class' => 'form-control', 'placeholder' => 'Type your event Postcode here'])}}
            </div>
        </div>
        
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection


