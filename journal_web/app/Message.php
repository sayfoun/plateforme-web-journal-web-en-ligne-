<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $table = 'messages';
  //  protected $fillable =['name','body'] ;
  //  public    $timestamps = false;
  protected $fillable = ['sujet','message' ];

  public function user(){
     return $this->belongsTo('App\user');
     }
}
