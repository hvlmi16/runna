<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orgName', 'email', 'password', 'username', 'orgContNum', 'orgSsmNum', 'orgAddress', 'orgCity', 'orgState', 'orgPostcode', 'orgCountry'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**One to Many */
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /**many to Many */
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasRole(String $role){
        
        foreach($this->roles as $rol){
            if($rol->name == $role){
                return true;
            }
        }
        return false;
    }

    public function hasPermission(String $permission){
        foreach($this->roles as $role){
            foreach($role->permissions as $perm){
                if($perm->name == $permission){
                    return true;
                }
            }
        }
        return false;
    }

    public function registrations(){
        return $this->hasMany('App\Registration', 'user_id');
    }

    public function profile(){
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function ratings(){
        return $this->hasMany('App\Rating', 'user_id');
    }

    public function payments(){
        return $this->hasMany('App\Payment', 'user_id');
    }
}
