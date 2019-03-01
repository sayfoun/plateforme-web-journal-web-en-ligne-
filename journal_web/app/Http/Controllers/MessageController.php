<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Message;
 use App\Http\Controllers\Redirect;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('user.message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
  $message=new Message();
  $message->sujet= $req->input('sujet');
  $message->message= $req->input('message');
  $message->user_id = Auth::user()->id;
  $message->save();

    session()->flash('mess','le message a ete envoyer !');
    return redirect()->action('ProfilController@profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {  
        $messages=Message::orderBy('created_at','desc')->paginate(3); 
        return view('admin.messages',array('messages'=>$messages));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $message=Message::findOrFail($id);
        $message->delete();
        session()->flash('success',"Le message a été supprimé!");
        return redirect()->route('messages');
    }
    public function create_notfication($id)
    {
       dump($id);
        return view('admin.notification');
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
