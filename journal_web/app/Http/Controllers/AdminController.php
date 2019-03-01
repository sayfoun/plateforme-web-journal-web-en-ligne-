<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Singale;
use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function journalistes()

    {
        $journalistes=User::where('journaliste',1)->orderBy('created_at')->paginate(4);
        return view('admin.journaliste')->with('journalistes',$journalistes);
    }

    public function utlisateurs()

    {
        $uesrs=User::where('journaliste',0)->orderBy('created_at')->paginate(3);
        return view('admin.userssimple')->with('users',$uesrs);
    }

    
    public function activer(Request $requset)
    {  $id=$requset->user_id;
      $user=User::where('id',$id)->findOrFail($id);
       $user->journaliste=1;
       $name=$user->name;
       $prenon=$user->last_name;
       $user->save();
       session()->flash('success',"On ma donné le droit décrire pour !" .$name ." " .$prenon);
      return redirect()->route('delete_active');

    }
     public function delete(Request $requset)
    {
       $id=$requset->user_id;
       $user=User::where('id',$id)->findOrFail($id);
       $name=$user->name;
       $prenon=$user->last_name;
       $user->delete();
       session()->flash('success',"Compte supprimé pour  !" .$name ." " .$prenon);
      return redirect()->route('delete_active');

    }
    public function desactiver(Request $requset)
    {
       $id=$requset->journaliste_id;
       $user=User::where('id',$id)->findOrFail($id);
       $user->journaliste=0;
       $name=$user->name;
       $prenon=$user->last_name;
       $user->save();
       session()->flash('success',"Le droit d'écrire a été supprimé pour   l'utlisateur !" .$name ." " .$prenon);
       return redirect()->route('delete_desactive');
       //return redirect()->action('AdminController@journalistes');
      

    }
    public function supprimer(Request $requset)
    {
      $id=$requset->journaliste_id;
      $user=User::where('id',$id)->findOrFail($id);
      $name=$user->name;
       $prenon=$user->last_name;
       $user->delete();
       session()->flash('success',"Compte supprimé pour  !" .$name ." " .$prenon);
       return redirect()->action('AdminController@journalistes');
      //return redirect()->route('delete_desactive');

    }

      public function cadres()
    {
        return view('admin.cadres');
    }
    public function demande()
     {
      $demandes=User::where('official_Document','<>','document.png')
                       ->where('journaliste',0)
                      ->simplePaginate(1);
                      
      return view('admin.demande')->with('demandes',$demandes);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articles()
    {   
        $articles=Post::orderBy('created_at')->paginate(7);
        return view('admin.articles')->with('articles',$articles);
    }

public function lire(Request $request)
{
  
  $post=Post::findOrFail($request->post_id);
  return view('admin.lire')->with('post',$post);
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function articles_supprimer()
    {
        $articles=Post::withTrashed()->paginate(6);
        
        return view('admin.articles_supprimer')->with('articles',$articles);;   
    }

public function delete_soft(Request $request ,$id)
{
  $articles=Post::where('id','=',$id)->forceDelete();
 return  back()->withInput();
}
public function lire_soft(Request $request ,$id)
{
  
  $post=Post::withTrashed()->whereid($id)->get();
  dump($post);
  return view('admin.lire')->with('post',$post);
}
public function recupere(Request $request, $id)
{
  $post=Post::withTrashed()->find($id);
  $post->restore();
  return view('admin.lire')->with('post',$post);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singaler()
    {

      $singaler_id=Singale::select('post_id')->get();
      dump($singaler_id);
     
        
       
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
