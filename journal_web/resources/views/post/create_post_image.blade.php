@extends('layouts.entete')
@section('sayfoun')
<br><br><br>
<section class="resume-section p-3 p-lg-5  d-column" id="ajoute">
       <div class="my-auto"> <!--divmy auto-->
       <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">Ajouter un article</h3></div>
       </br>
  {!! Form::open(['url' => '/profil/store_image','method'=>'post'  , 'enctype' => 'multipart/form-data']) !!}
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
                  {{Form::text('title','' , ['class'=>'form-control', 'placeholder'=>'titire'])}}
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
                  {{Form::file('image')}}
                  @if ($errors->has('image'))
                      <span class="help-block">
                          <strong>{{ $errors->first('image') }}</strong>
                      </span>
                  @endif
           </div>

              {{Form::submit('publiér' , ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!}



            <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; " > <a href="/profil/uploade_video">Ajouter un vidéo</a></h3></div>
           <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">  <a href="/profil/create">Ajouter un article</a></h3></div>
           </div>

</section>




@endsection
