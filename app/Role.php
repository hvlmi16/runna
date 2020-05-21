<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**many to Many */
    public function users(){
        return $this->belongsToMany('App\User');
    }

    /**many to Many */
    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }
}
