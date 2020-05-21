@extends('layout.app')

@section('content')

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Contact Number</th>
        <th>State</th>
        <th>Date of Birth</th>
        <th>Shirt Size</th>
        <th>Emg. Contact Name</th>
        <th>Emg. Contact Number</th>
        <th>Action</th>
    </tr>
    @foreach ($profiles as $profile)
    
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $profile->firstName }}</td>
        <td>{{ $profile->lastName }}</td>
        <td>{{ $profile->contactNumber }}</td>
        <td>{{ $profile->state }}</td>
        <td>{{ $profile->p_dob }}</td>
        <td>{{ $profile->shirtSize }}</td>
        <td>{{ $profile->emergencyContactName }}</td>
        <td>{{ $profile->emergencyContactNumber }}</td>
        <td>
            <a href="{{ route('show-profile', [$profile->id]) }}">View</a>
        </td>
    </tr>   
    @endforeach
</table>
@endsection