<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','sex','avatar','last_name','cin','adresse','official_Document',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function post(){
      return $this->hasMany('App\Post');
    }
    public function likes(){
      return $this->hasMany('App\Like');
    }
    public function message(){
      return $this->hasMany('App\Message');
    }
    public function comentaire(){
      return $this->hasMany('App\Comentaire');
    }
     public function singale(){
      return $this->hasMany('App\Singale');
    }
         public function notification(){
      return $this->hasMany('App\Notification');
    }

protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->Post()->forcedelete();
             $user->comentaire()->delete();
             $user->message()->delete();
             $user->likes()->delete(); 
            // $user->singale()->delete();
             //$user->notification()->delete();           
        });
    }
}
