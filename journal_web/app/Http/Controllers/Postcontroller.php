<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\ControllerValidatesRequestsvalidate;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Controllers\Redirect;
class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

                          public function show()
                          {
                            $message="aucun articles a été publié";                          
                                      if (Auth::guest())
                                       {
                                      return view('auth.login');
                                      }

                                      elseif(Auth::user()->journaliste==1)
                                      {
                                          $nbrarticles=Post::where('user_id','=',Auth::user()->id)->count();

                                          if($nbrarticles>0)
                                          {

                                            $postes=Post::where('user_id','=',Auth::user()->id)->get();
                                             
                                              $al=1;
                                              return  view('user.profil',['al'=>$al])->with('postes', $postes);

                                          }

                                          else
                                      {
                                        $al=0;
                                        return view('user.profil',['al'=>$al])->with('message',$message);
                                      }

                                    }






                          }


    public function create()
    {
        $category= Post::get_types();
      return view('post.create')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $this->validate($req, [

      'title' => 'required|bail|max:40,',
      'sujet' => 'required|bail|min:120|max:170',
      'description' => 'required|bail|min:100',
    ]);


      $post = new Post;
      $post->titre = $req->input('title');
      $post->sujet = $req->input('sujet');
      $post->description = $req->input('description');
      $post->user_id = Auth()->user()->id;
      $post->category = $req->input('domaine');
      $post->save();

     session()->flash('success','La publication a été téléchargée correctement!');
      return redirect()->action('ProfilController@profil');
    }


    //return view update image
    public function pub_img()
    {
      $category= Post::get_types();
    return view('post.post_image')->with('category', $category);
    }
  //  pulbic function uploade_video(Requset $req)
  //  {
    //  if($req->has_file('video'))
    //}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_video()
    {
       $category= Post::get_types();

    return view('post.create_video')->with('category', $category);

    }

    public function store_video(Request $req)
    {
      $this->validate($req, [
      'title' => 'required|bail|max:50',
      'sujet' => 'required|bail|min:120|max:170',
      'domaine'=>'bail|required',
      'video' => 'bail|required|',
    ]);

 
       $post= new Post;
       $post->titre = $req->input('title');
       $post->sujet = $req->input('sujet');
       $post->user_id = Auth()->user()->id;
       $post->category = $req->input('domaine');
       $post->video = $req->video;
       $post->save();
       session()->flash('pub_post','La publication a été téléchargée correctement!');
        return redirect()->action('ProfilController@profil');
     }

 
       public function create_image()
    {
      $category= Post::get_types();

    return view('post.create_post_image')->with('category', $category);

    }




    public function store_post_image(Request $req)
    {

      $this->validate($req, [
      'title' => 'required|bail|max:40',
      'sujet' => 'required|bail|min:120|max:170',
      'domaine'=>'bail|required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);
     if($req->hasFile('image')){
       $post_image = $req->file('image');
       $filename = time() . '.' . $post_image->getClientOriginalExtension();
       Image::make($post_image)->save( public_path('/uploads/post_image/' . $filename ) );
       $post = new Post;
       $post->titre = $req->input('title');
       $post->sujet = $req->input('sujet');
       $post->user_id = Auth()->user()->id;
       $post->category = $req->input('domaine');
       $post->image =$filename;
       $post->save();
       session()->flash('pub_post','La publication a été téléchargée correctement!');
        return redirect()->action('ProfilController@profil');
     }

    }
    public function delete(Request $request,$id)
    {
      $post=Post::findOrFail($id);
      $post->delete();
      return back()->withInput();
    }

      public function delete_l(Request $request,$id)
    {
      
      $post=Post::findOrFail($id);
      $post->delete(); 
  return redirect()->action('AdminController@articles');


    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
