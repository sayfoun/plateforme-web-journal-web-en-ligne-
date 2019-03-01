<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
class SearchController extends Controller
{
    /**
     * Display listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $requset)
    {

     $search=$requset->input('search');
    
      $postes=Post::where('titre','like','%'.$search.'%')
      ->orwhere('sujet','like','%'.$search.'%')
      ->orwhere('description','like','%'.$search.'%')
      //->having('user_', '>', 100)
     // ->having('user_id','=',Auth::user()->id)
      ->orderBy('created_at', 'desc')
      ->paginate(4);   
       return view('post.search')->with('postes',$postes);
    }
    public function article_q(Request $requset)
    {

     $search=$requset->input('search');
    
      $articles=Post::where('titre','like','%'.$search.'%')
      ->orwhere('sujet','like','%'.$search.'%')
      ->orderBy('created_at', 'desc')
      ->paginate(4);    
       return view('admin.searcharticle')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function serach_accuiel(Request $req)
    {


        $video=Post::
          where('video','<>',"null")
          ->orderBy('created_at','desc')
          ->limit(5)
          ->get();
          $image=Post::
          where('image','<>',"null")
          ->orderBy('created_at','desc')
          ->limit(5)
          ->get();
    $category= Post::get_types();
       $search=$req->input('search');
      $articles=Post::where('titre','like','%'.$search.'%')
      ->orwhere('sujet','like','%'.$search.'%')
      ->orwhere('description','like','%'.$search.'%')
      ->orderBy('created_at', 'desc')
      ->paginate(5);
       return view('entete')->with('category', $category)
        ->with('articles',$articles)
        ->with('video',$video)
        ->with('image',$image)
        ->with('category',$category);
    }

  public function date(Request $request, $anne)
  {


        $video=Post::
          where('video','<>',"null")
          ->orderBy('created_at','desc')
          ->limit(5)
          ->get();
          $image=Post::
          where('image','<>',"null")
          ->orderBy('created_at','desc')
          ->limit(5)
          ->get();
        $category= Post::get_types();

        $post=Post::where('created_at',$request->input('x'))
        ->orderBy('created_at','desc')
        ->first();
        dump($post);

       

  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

     */
    public function Serach_journalsite(Request $req)
    {

    

                                            $search=$req->input('journaliste');
                                            $journalistes=User::where('name','like','%'.$search.'%')
                                            ->orwhere('last_name','like','%'.$search.'%')
                                            ->orwhere('email','like','%'.$search.'%')
                                            ->having('journaliste','=',1)
                                            ->orderBy('created_at')
                                            ->get();
                                            

                                            session()->flash('success',"aucun résultat pour ce :: ". $search ."!...");
                                                  
                                            return view('admin.rechreche-journaliste')->with('journalistes',$journalistes);


                                    
                            
                            
    }
    public function Search_user(Request $req)
    {
       

         
        
                
                                            $search=$req->input('user');
                                            $users=User::where('name','like','%'.$search.'%')
                                            ->orwhere('last_name','like','%'.$search.'%')
                                            ->orwhere('email','like','%'.$search.'%')
                                            ->having('journaliste','=',0)
                                            ->orderBy('created_at')
                                            ->get();
                                            

                                            session()->flash('success',"aucun résultat pour ce :: ". $search ."!...");
                                                  
                                            return view('admin.rechreche')->with('users',$users);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lire(Request $req ,$id) 
    {    
        $category= Post::get_types();
        $post=Post::findOrFail($id);
       return view('acc.lire')
        ->with('post',$post)
        ->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categorie(Request $request)
    {
            $image=Post::
          where('image','=',"saif")
          ->orderBy('created_at','desc')
          ->limit(6)
          ->get();
        $video= $request->input('x');
        $category= Post::get_types();
        $articles=Post::where('category', $request->input('x'))
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('acc.categorie')
        ->with('category', $category)
        ->with('image',$image)
        ->with('articles',$articles)
        ->with('video',$video);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
      $category= Post::get_types();

      return view('acc.contact')->with('category', $category);
    }
}
