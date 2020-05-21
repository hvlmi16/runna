<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'contactNumber' => 'required',
        ]);
        
        if(\Auth::user()->hasRole('participant')){
            $request->validate([
                'p_dob' => 'required',
                'p_gender' => 'required',
                'p_emergencyName' => 'required',
                'p_emergencyContactNumber' => 'required',
                'p_shirtSize' => 'required',
            ]);
        }

        $profile = new Profile;
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->address = $request->address;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->postcode = $request->postcode;
        $profile->contactNumber = $request->contactNumber;

        if(\Auth::user()->hasRole('participant')){
            $profile->p_dob = $request->p_dob;
            $profile->p_gender = $request->p_gender;
            $profile->p_emergencyName = $request->p_emergencyName;
            $profile->p_emergencyContactNumber = $request->p_emergencyContactNumber;
            $profile->p_shirtSize = $request->p_shirtSize;
        }

        $profile->user_id = \Auth::user()->id;

        $profile->saveOrFail();

        return redirect('/')->with('success', 'Your Profile has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        
        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        
        return view('profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'contactNumber' => 'required',
        ]);
        
        if(\Auth::user()->hasRole('participant')){
            $request->validate([
                'p_dob' => 'required',
                'p_gender' => 'required',
                'p_emergencyName' => 'required',
                'p_emergencyContactNumber' => 'required',
                'p_shirtSize' => 'required',
            ]);
        }

        $profile = Profile::find($id);
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->address = $request->address;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->postcode = $request->postcode;
        $profile->contactNumber = $request->contactNumber;

        if(\Auth::user()->hasRole('participant')){
            $profile->p_dob = $request->p_dob;
            $profile->p_gender = $request->p_gender;
            $profile->p_emergencyName = $request->p_emergencyName;
            $profile->p_emergencyContactNumber = $request->p_emergencyContactNumber;
            $profile->p_shirtSize = $request->p_shirtSize;
        }

        $profile->user_id = \Auth::user()->id;

        $profile->saveOrFail();

        return redirect('profiles.show')->with('success', 'Your Profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
