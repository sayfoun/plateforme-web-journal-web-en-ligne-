@extends('admin.admin')
@section('amal')

 @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 
 @foreach($messages as $message)
       <!-- Example Notifications Card-->
          <div class="card mb-3">
            <strong> {{DB::table('users')->whereid($message->user_id)->value('name')}} {{DB::table('users')->whereid($message->user_id)->value('last_name')}} </strong>
            <strong class="text-info">sujet::<strong class="text-success

">{{$message->sujet}}</strong></strong>

 <p class="font-weight-bold">{{$message->message}}</p>

 <form method="post" action="/message/supprimer/{{$message->id}}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input  name="message_id" type="hidden" value="{{$message->id}}">
  <a class="btn btn-success" type="submit" style="float: right;" href="/message/repondre/{{$message->id}}">Repondre</a>
 <button class="alert alert-info" type="submit" style="float: right ,padding-top;">supprimer</button>
 </form>
 
  </div>
 @endforeach
  {!! $messages->render() !!}
@endsection