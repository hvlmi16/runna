<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function user(){
        return $this->belongTo('App\User', 'user_id');
    }

    public function post(){
        return $this->belongTo('App\Post', 'post_id');
    }
}
