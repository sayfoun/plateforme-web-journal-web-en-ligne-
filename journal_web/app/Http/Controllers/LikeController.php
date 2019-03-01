<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Response;
use DB;
use App\Post;
use App\User;
use App\Like;
use App\Singale;


class LikeController extends Controller

{  public function like(Request $request)
    { 
       $like_s = $request->like_s;
       $post_id = $request->post_id;
       $is_like = 0;
    
     //fibd like
       $like=DB::table('likes')
       ->where('post_id', $post_id)
       ->where('user_id', Auth::user()->id)
       ->first();
       
       if(!$like)
       {
        $newlike= new Like;
        $newlike->post_id=$post_id;
        $newlike->user_id= Auth::user()->id;
        $newlike->like=1;
        $newlike->save();
        $is_like = 1;
       }

       elseif($like->like == 1)
       {
         DB::table('likes')
         ->where('like',1)
         ->where('post_id', $post_id)
         ->where('user_id', Auth::user()->id)
         ->delete();
         $is_like = 0;
       }

       elseif($like->like == 0)
       {
        DB::table('likes')
        ->where('like',0)
        ->where('post_id', $post_id)
       ->where('user_id', Auth::user()->id)
       ->delete();
       
       $newlike= new Like;
        $newlike->post_id=$post_id;
        $newlike->user_id= Auth::user()->id;
        $newlike->like=1;
        $newlike->save();
      $is_like = 11;
       }
       $count_like=DB::table('likes')->where('like',1)->where('post_id', $post_id)->count();
            $response= array('is_like' => $is_like,'count_like' =>$count_like,);
       return response()->json( $response, 200);


    }

public function dislike(Request $request)
    { 
       
       $post_id = $request->post_id;
       $is_dislike = 0;
       $like=DB::table('likes')
       ->where('post_id', $post_id)
       ->where('user_id', Auth::user()->id)
       ->first();

       if(!$like)
       {
        $newlike= new Like;
        $newlike->post_id=$post_id;
        $newlike->user_id= Auth::user()->id;
        $newlike->like=0;
        $newlike->save();
        $is_dislike = 1;
       }
       elseif($like->like == 0)
       {
        DB::table('likes')
        ->where('like',0)
        ->where('post_id', $post_id)
        ->where('user_id', Auth::user()->id)
        ->delete();
       $is_dislike = 0;
       
       }
       elseif($like->like == 1)
       {

         DB::table('likes')
        ->where('like',1)
        ->where('post_id', $post_id)
        ->where('user_id', Auth::user()->id)
        ->delete();

        $newlike= new Like;
        $newlike->post_id=$post_id;
        $newlike->user_id= Auth::user()->id;
        $newlike->like=0;
        $newlike->save();
      $is_like = 11;
       }

       $count_dislike=DB::table('likes')->where('like',0)->where('post_id', $post_id)->count();
            $response= array('is_like' => $is_dislike,'count_like' =>$count_dislike,);
       return response()->json( $response, 200);


    }












    
    public function singaler(Request $request)
    {
      $post_id =$request->post_id;
    $res=DB::table('singales')
       ->where('post_id', $post_id)
       ->where('user_id', Auth::user()->id)
       ->first();
    if(!$res)
       {
        $Singale= new Singale;
        $Singale->post_id=$post_id;
        $Singale->user_id= Auth::user()->id;
        $Singale->save();
        $is_singale = 1;
       }
     else
       {
        DB::table('singales')
        ->where('post_id', $post_id)
       ->where('user_id', Auth::user()->id)
       ->delete();
       $is_singale = 0;
       
       }
       $count_singale=DB::table('singales')->where('post_id', $post_id)->count();
            $response= array('is_singale' => $is_singale,'count_singale' =>$count_singale,);
            return response()->json($response, 200);

   }
}
