@extends ('layout.app')

@section('content')

<!-- Begin Page Content -->                  
<div class="col-md-9">
  
    <div class="container">  
      
        <h3><b>Profile</b></h3>
        <h4>Your Profile Details</h4>
      <br>
        <table class="table table-bordered">
        
          <tr>
              <th>First Name</th>
              <th>{{$profile->firstName}}</th>
          </tr>

          <tr>
            <th>Last Name</th>
            <th>{{$profile->lastName}}</th>
        </tr>

        <tr>
          <th>Address</th>
          <th>{{$profile->address}}</th>
        </tr>

        <tr>
          <th>City</th>
          <th>{{$profile->city}}</th>
        </tr>

        <tr>
          <th>State</th>
          <th>{{$profile->state}}</th>
        </tr>

        <tr>
          <th>Postcode</th>
          <th>{{$profile->postcode}}</th>
        </tr>

        <tr>
          <th>Country</th>
          <th>{{$profile->country}}</th>
        </tr>

        <tr>
          <th>Contact Number</th>
          <th>{{$profile->contactNumber}}</th>
        </tr>

        @if(Auth::user()->hasRole('participant')) 
        {{-- @if(Auth::user()->) --}}

          <tr>
            <th>Date of Birth</th>
            <th>{{$profile->p_dob}}</th>
          </tr>

          <tr>
            <th>Gender</th>
            <th>{{$profile->p_gender}}</th>
          </tr>

          <tr>
            <th>Emergency Name</th>
            <th>{{$profile->p_emergencyName}}</th>
          </tr>

          <tr>
            <th>Emergency Contact Number</th>
            <th>{{$profile->p_emergencyContactNumber}}</th>
          </tr>

          <tr>
            <th>Shirt Size</th>
            <th>{{$profile->p_shirtSize}}</th>
          </tr>
        @endif
        </table> 
                                               
    </div>
</div>

    @if(Auth::user()->id == $profile->user_id) {{-- Only user with same user_id post can edit & delete --}} 
    <a href="{{route('edit-profile', [$profile->id])}}" class = "btn btn-secondary float-right px-4 my-2">Edit</a>
   @endif 



@endsection
<!-- End of Main Content -->