@extends('layouts.entete')

@section('sayfoun')

<section class="resume-section p-3 p-lg-5 d-flex d-column" id="ajoute">
       <div class="my-auto">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profil/changeavatar" method="POST">
                <label><h3>Modifier le photo de profil</h3>
                </label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>

</div>
</section>

@endsection
