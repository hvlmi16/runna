<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index (){
        $title = 'Welcome to Runna';
        return view('pages.index', compact('title'));
        //return view('pages.index')-> with('title', $title);
    }

    public function about (){
        $title = 'About RUNNA';
        return view('pages.about', compact('title'));
        //return view('pages.about')-> with('title', $title);
    }

    public function events (){
        $data = array(
            'title' => 'Events',
            'events' => ['Fun Run', 'Half Marathon', 'Full Marathon']
        );
        return view('pages.events')-> with ($data);
    }
}
