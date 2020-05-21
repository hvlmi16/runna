<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    
    //Primary Key
    public $primaryKey = 'cat_id';
    // Foreign Key
    // public $foreignKey = 'post_id';

    public $timestamps = false;
   
    //Create Relationship
    public function post(){
        return $this->belongsTo('App\Post');    
    }
}
