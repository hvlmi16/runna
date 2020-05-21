<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registration;
use App\Post;
use Auth;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->hasRole('eventDirector')){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('dashboard')->with('posts', $user->posts);
        }
        
        if(\Auth::user()->hasRole('participant')){
            // $registrations = \Registration::find($registration->user_id);
            $registrations = Registration::where('registrations.user_id', Auth::User()->id)
            // $posts = Post::where('post_registration.registration_id', $registrations->id)
            ->leftJoin('post_registration', 'post_registration.registration_id', '=', 'registrations.id')
            ->leftJoin('posts', 'posts.post_id', '=', 'post_registration.post_id')
            ->get();

            return view('dashboard')->with('registrations', $registrations);
            // return $registrations;
        }

    }
}
