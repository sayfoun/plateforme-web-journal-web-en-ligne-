<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ControllerValidatesRequestsvalidate;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Redirect;
use Auth;
use App\Post;
use App\Comentaire;
use App\User;
class ComentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comentaire(Request $request ,$id)
    {   
     
      $this->validate($request, [
      'content' => 'required|string',
                                ]);
        $post=Post::findOrFail($id);
        $comentaire= new Comentaire;
        $comentaire->content=$request->input('content');
        $comentaire->user_id=Auth::user()->id;
        $comentaire->post_id=$id;
        $comentaire->save();
       

       return back()->withInput();
    }


    public function com(Request $request ,$id)
    {   
     
      $this->validate($request, [
      'content' => 'required|string',
                    ]);
        $comentaire= new Comentaire;
        $comentaire->content=$request->input('content');
        $comentaire->user_id=Auth::user()->id;
        $comentaire->post_id=$id;
        $comentaire->save(); 

       $category= Post::get_types();
        $post=Post::findOrFail($id);
       return view('acc.lire')
        ->with('post',$post)
        ->with('category',$category);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
