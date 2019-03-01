@extends('layouts.entete')
@section('sayfoun')
<br><br><br>
<section class="resume-section p-3 p-lg-5  d-column" id="ajoute">
       <div class="my-auto">
  <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">Ajouter un vidéo</h3></div>
  </br>
  {!! Form::open(['url' => '/profil/store_video','method'=>'post'  , 'enctype' => 'multipart/form-data']) !!}
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group" class="form-group{{ $errors->has('') ? ' has-error' : '' }}" style="padding-left: 80%">
            {{Form::select('domaine', $category, []) }}
              @if ($errors->has('domaine'))
                  <span class="help-block">
                      <strong>{{ $errors->first('domaine') }}</strong>
                  </span>
              @endif
      </div>
      <div class="form-group">

              {{Form::label('titre','Title')}}
              {{Form::text('title','' , ['class'=>'form-control', 'placeholder'=>'titre'])}}
              @if ($errors->has('title'))
                  <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
      </div>
     
      <div class="form-group">
              {{Form::label('Sujet','Sujet')}}
              {{Form::text('sujet','' , ['class'=>'form-control', 'placeholder'=>'sujet'])}}
              @if ($errors->has('sujet'))
                  <span class="help-block">
                      <strong>{{ $errors->first('sujet') }}</strong>
                  </span>
              @endif
      </div>
     <br>
     <div class="form-group">
              {{Form::label('video','video')}}
              {{Form::text('video','' , ['class'=>'form-control', 'placeholder'=>' url youtube'])}}
              @if ($errors->has('video'))
                  <span class="help-block">
                      <strong>{{ $errors->first('video') }}</strong>
                  </span>
              @endif
      </div>
     
</br>
              {{Form::submit('publiér' , ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!}
</div>
           <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; " > <a href="/profil/post_image">Ajouter un image</a></h3></div>
           <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">  <a href="/profil/create">Ajouter un article</a></h3></div>
           </div>
</section>




@endsection


