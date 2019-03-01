@extends('layouts.entete')
@section('sayfoun')
<br><br><br>
<section class=" p-2 p-lg-5  d-column" id="ajoute" style="padding-left: 50px;">
       <div class="my-auto" >
  <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">Ajouter un article</h3></div>
  </br>
  {!! Form::open(['url' => '/profil/store','method'=>'post',]) !!}
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
              {{Form::label('title','Title')}}
    {{Form::text('title','' , ['class'=>'form-control', 'placeholder'=>'nom article'])}}
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
      <div class="form-group">
              {{Form::label('description','Description')}}
              {{Form::textarea('description','' , ['id'=>'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'contenu arilcle'])}}
              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
       </div>

              {{Form::submit('Publier' , ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!}
</div>
    <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; " > <a href="/profil/uploade_video">Ajouter un vidéo</a></h3></div>
    <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">  <a href="/profil/post_image">Ajouter un image</a></h3></div>
</section>




@endsection
