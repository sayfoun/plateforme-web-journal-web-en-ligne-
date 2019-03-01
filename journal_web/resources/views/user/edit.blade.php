@extends('layouts.entete')
@section('sayfoun')
<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="settings">
  <div class="my-auto">
    <h3>modifier paramètres de compte</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('profil') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->last_name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">CIN</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="cin" value="{{ Auth::user()->cin  }}" required autofocus>

                                    @if ($errors->has('cin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                           
                             
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 </div>
</section>
@endsection
