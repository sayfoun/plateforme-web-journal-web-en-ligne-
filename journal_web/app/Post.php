<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
  protected $table = 'postes';
  
  //  protected $fillable =['name','body'] ;
  //  public    $timestamps = false;
  protected $fillable = ['titre', 'category','sujet', 'description','video','image','created_at',];

  public function user(){
     return $this->belongsTo('App\user');
     }
     public function comentaire(){
      return $this->hasMany('App\Comentaire');
    }
    public function likes(){
      return $this->hasMany('App\Like');
    }

public function singale(){
      return $this->hasMany('App\Singale');
    }
     public static function get_types()
     {
     	$types_str = DB::select(DB::raw('SHOW COLUMNS FROM postes WHERE FIELD = "category";'))[0]->Type;

     	preg_match_all("/'([^']+)'/", $types_str, $matches);

     	// Return matches
     	return isset($matches[1]) ? $matches[1] : [];
     }

      protected $dates = ['deleted_at'];

protected static function boot() {
        parent::boot();

        static::deleting(function($article) { // before delete() method call this
             $article->likes()->delete();
             $article->comentaire()->delete(); 
             $article->singale()->delete();
             //$user->notification()->delete();           
        });
    }

}
