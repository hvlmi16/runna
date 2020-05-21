<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function posts(){
        return $this->belongsToMany('App\Post', 'post_registration', 'registration_id', 'post_id');
    }
}
