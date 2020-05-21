<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name

    // Primary Key
    public $primaryKey = 'post_id';
    // Timestampe
    public $timestamp = true;

    // body
    public $string = ['event_image', 'event_shirt', 'event_medal'];
    
    //Create Relationship
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        // $categories = App\Category::where()
        return $this->hasMany('App\Category', 'post_id');
    }

    public function registrations(){
       
        return $this->belongsToMany('App\Registration', 'post_registration', 'post_id', 'registration_id');
    }

    public function ratings(){
        
        return $this->hasMany('App\Rating', 'post_id');
    }

    public function payments(){
        
        return $this->hasMany('App\Payment', 'post_id');
    }

}
