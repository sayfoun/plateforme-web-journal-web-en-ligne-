<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Message;
use File;
use App\Post;
 use App\Http\Controllers\Redirect;
 
class ProfilController extends Controller
{
   public function index()
   {

      if(Auth::guest())
      {
        return view('welcome');
      }
      else
      {
        return redirect()->action('ProfilController@Accueil');
      }
    
   }
    public function profil()
    {
      if(Auth::guest())
      { return view('welcome');}
    
       elseif(Auth::user()->role_id =='admin')
        {
                
          return view('admin.admin');
        }
    elseif(Auth::user()->journaliste==0)
    {
     return redirect()->route('home');
    }
    {
      session()->flash('welcome','Bienvenue à tout le temps');
      $postes=Post::where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->paginate(2);
      return view('user.profil')->with('postes',$postes);
    }
    }
    //photo de profil



   public function form_image()
   {
    return view('user.changeimage', array('user' => Auth::user()) );
   }



   public function update_avatar(Request $request)
   {    
     $old_avatar= Auth::user()->avatar;
       if($request->hasFile('avatar'))
       {
     		$avatar = $request->file('avatar');
     		$filename = time() . '.' . $avatar->getClientOriginalExtension();
     		Image::make($avatar)->resize(250, 250)->save( public_path('/uploads/avatars/' . $filename ) );
     		$user = Auth::user();
     		$user->avatar = $filename;
        $user->cin =$request->cin;
     		$user->save();
     	}
      if($old_avatar!='user.png' && $old_avatar!='femme.png') {
        file::delete(public_path() . '/uploads/avatars/'. $old_avatar);
      }

      if(Auth::user()->journaliste==1)
      {
        return view('post.resultat', array('user' => Auth::user()) );
      }
  	  else
      {
        return redirect()->action('ProfilController@Accueil');
      }

     }



    public function edit()
    {
    return view('user.edit');
    }



    public function create()
    {

      return view('post.journaliste');
    }



        public function Accueil()
        {
          if(Auth::guest())
      {
        return view('welcome');
      }
      else
      {
          $video=Post::
          where('video','<>',"null")
          ->orderBy('created_at','desc')
          ->get();
          $image=Post::
          where('image','<>',"null")
          ->orderBy('created_at','desc')
          ->paginate(13);
          $articles=Post::
          orderBy('created_at','desc')->paginate(10);
          $category= Post::get_types();
          
        return view('home')->with('category', $category)
        ->with('articles',$articles)
        ->with('video',$video)
        ->with('image',$image);
      }
        }


        public function uploads_carte_service(Request $request)
        {

          $this->validate($request, [
            'officialDocument' => 'required',
                                    ]);
         	// Handle the user upload of avatar

          	if($request->hasFile('officialDocument')){
          		$officialDocument = $request->file('officialDocument');
          		$filename = time() . '.' . $officialDocument->

              getClientOriginalExtension();
          		Image::make($officialDocument)->resize(800,700)->save( public_path('/uploads/official_Document/' . $filename ) );

          		$user = Auth::user();
          		$user->official_Document = $filename;
          		$user->save();
              session()->flash('doc','weslit say!');
               return redirect('profil');
          	}

else{
      session()->flash('doc','error');
   return view('user.profil', array('user' => Auth::user()) );}



          }

        public function carte_service()
        {
          if (Auth::guest()) {

          return view('login');
          }
          else {
            return view('user.uploade_fichier_personnel');
          }
        }


       
}
