@extends('admin.admin')
@section('amal')
@if($users->isEmpty())
   <div class="card mb-3">
      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
      
 <div class="card-header">
         <i class="fa fa-table"></i> database::utlisateurs simple </div>
        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="/rechreche/utlisateurs">
            <div class="input-group">
              <input class="form-control" type="text"  name="user" placeholder="Search for..." required="">
              <span class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
          @else
          <div class="card-header">
         <i class="fa fa-table"></i> database::utlisateurs simple </div>
        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="/rechreche/utlisateurs">
            <div class="input-group">
              <input class="form-control" type="text"  name="user" placeholder="Search for..." required="">
              <span class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                  <td>Nom</td>
                  <td>Prenon</td>
                  <td>Adresse E-mail</td>
                  <td>sex</td>
                  <td>journaliste</td>
                  <td>droite d'ecriture</td>
                  <td>Compte</td>
                </tr>
                @foreach($users as $user)
                  <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->sex}}</td>
                  <td>journaliste</td>
                  <td> 
                  <form  action="/profil/active" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="user_id" type="hidden" value="{{$user->id}}">
                  <button class="btn btn-success">activer</button>
                  </form>
                  </td>
                  <td>
                  <form  action="/profil/delete" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="user_id" type="hidden" value="{{$user->id}}">
                  <button class="btn btn-danger">supprimer</button>
                  </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      <div class="paginate_button page-item "></div>
      </div>
    </div>
    @endif
@endsection