@extends('admin.admin')
@section('amal')
@foreach($demandes as $demande)
<div >
<img  alt="docment" src="/uploads/official_Document/{{$demande->official_Document}}" style="float:right;
	background-color:white;
	width:60%;
	margin:0; ">
<ul style="	width:40%;
	float:left;
	margin:0;
	height:75%">
<ol>
donnees de utlisateurs:
</ol>
<ol>
 Nom:{{$demande->name}}
 </ol>
 <ol>
 prenon :{{$demande->last_name}} 
 </ol>
 <ol>
 {{DB::connection()->getDoctrineColumn('users', 'sex')->getType()->get()}}
 sex:{{$demande->sex}}
 </ol>
 <ol>
 E-mail:{{$demande->email}}
 </ol>
 <ol>
 Numéro de carte d'identite:{{$demande->cin}}
 </ol>
</ol>
  </div>
  <form  action="/profil/active" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="user_id" type="hidden" value="{{$demande->id}}">
                  <button class="btn btn-success">activer</button>
                  </form>



@endforeach

@endsection