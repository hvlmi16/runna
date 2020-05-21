<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use DB;
use App\Mail\SignUpDone;
use Illuminate\Support\Facades\Mail;

class RegistrationsController extends Controller
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
    public function create($post_id )
    {
        // if(null !== (Registration::where('user_id', \Auth::user()->id)->first())){
        //     return redirect()->back()->with('info', 'You are alredy registered for this event.');
        // }

        if(isset(\Auth::user()->profile))
        {
            $registration = new Registration;
            $registration->user_id = (\Auth::user()->id);

            $registration->save();

            $post = \App\Post::findOrFail($post_id);

            $post->registrations()->attach($registration);

            // Mail::to($user->email)->send(new RegisterEvent());

            return redirect()->back()->with('success', 'You have registered successfully');

        }
        return redirect('profiles/create')->with('info', 'You need to complete your profile first to participate in an event.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'p_firstName' => 'required',
            'p_lastName' => 'required',
            'p_dob' => 'required',
            'gender' => 'required',
            'p_contNum' => 'required',
            'p_emgName' => 'required',
            'p_emgContNum' => 'required',
            'p_address' => 'required',
            'p_city' => 'required',
            'p_state' => 'required',
            'p_postcode' => 'required',
            'p_country' => 'required',
            'p_shirtSize' => 'required'
        ]);

        $registration = new Registration;
        $registration->p_firstName = $request->input('p_firstName');
        $registration->p_lastName = $request->input('p_lastName');
        $registration->p_dob = $request->input('p_dob');
        $registration->gender = $request->input('gender');
        $registration->p_contNum = $request->input('p_contNum');
        $registration->p_emgName = $request->input('p_emgName');
        $registration->p_emgContNum = $request->input('p_emgContNum');
        $registration->p_address = $request->input('p_address');
        $registration->p_city = $request->input('p_city');  
        $registration->p_state = $request->input('p_state');
        $registration->p_postcode = $request->input('p_postcode');
        $registration->p_country = $request->input('p_country');
        $registration->p_shirtSize = $request->input('p_shirtSize');
        $registration->user_id = $request->user()->id;
        $registration->save();

       

        return redirect('/posts')->with('success', 'Registration Complete');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $registrations = \App\Post::find($post_id)->registrations;

        $profiles = collect();

        foreach($registrations as $key=>$registration){
            $user = \App\User::find($registration->user_id);
            $profiles->put($key, $user->profile);
        }

        return view ('registrations.show')->with('registrations', $registrations)->with('profiles', $profiles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Already paid no edit
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
        $this->validate($request, [
            'p_firstName' => 'required',
            'p_lastName' => 'required',
            'p_dob' => 'required',
            'gender' => 'required',
            'p_contNum' => 'required',
            'p_emgName' => 'required',
            'p_emgContNum' => 'required',
            'p_address' => 'required',
            'p_city' => 'required',
            'p_state' => 'required',
            'p_postcode' => 'required',
            'p_country' => 'required',
            'p_shirtSize' => 'required'
        ]);

        $registration = new Registration;
        $registration->p_firstName = $request->input('p_firstName');
        $registration->p_lastName = $request->input('p_lastName');
        $registration->p_dob = $request->input('p_dob');
        $registration->gender = $request->input('gender');
        $registration->p_contNum = $request->input('p_contNum');
        $registration->p_emgName = $request->input('p_emgName');
        $registration->p_emgContNum = $request->input('p_emgContNum');
        $registration->p_address = $request->input('p_address');
        $registration->p_city = $request->input('p_city');  
        $registration->p_state = $request->input('p_state');
        $registration->p_postcode = $request->input('p_postcode');
        $registration->p_country = $request->input('p_country');
        $registration->p_shirtSize = $request->input('p_shirtSize');
        $registration->user_id = $request->user()->id;
        $registration->save();

        return redirect('/posts')->with('success', 'Registration Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Already paid no delete
    }
}
