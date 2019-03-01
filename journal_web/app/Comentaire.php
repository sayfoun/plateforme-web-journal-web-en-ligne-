<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentaire extends Model
{
    protected $table = 'comentaires';
  
   protected $fillable =['content','created_at',] ;
  //public    $timestamps->updated_at = false;
  

  public function user(){
     return $this->belongsTo('App\user');
     }
      public function post(){
     return $this->belongsTo('App\Post');
     }
}
