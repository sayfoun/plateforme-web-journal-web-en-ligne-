@extends('admin.admin')
@section('amal')
 <!-- Example DataTables Card-->
      <div class="card mb-3">
      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
      @endif
        <div class="card-header">
          <i class="fa fa-table"></i> database::journalistes</div>
          <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="/rechreche/journalistes">
         <div class="input-group">
              <input class="form-control" name="journaliste" type="text" placeholder="Search for..." >
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
                  <td></td>
                  <td>Nom</td>
                  <td>Prenon</td>
                  <td>Adresse E-mail</td>
                  <td>sex</td>
                  <td>journaliste</td>
                  <td>Droit d'ecriture</td>
                  <td>compte</td>
                </tr>
                @foreach($journalistes as $journaliste)
                  <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$journaliste->name}}</td>
                  <td>{{$journaliste->last_name}}</td>
                  <td>{{$journaliste->email}}</td>
                  <td>{{$journaliste->sex}}</td>
                  <td>oui</td>
                  <td> 
                  <form  action="/profil/desactiver" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="journaliste_id" type="hidden" value="{{$journaliste->id}}">
                  <button class="btn btn-danger">désactiver</button>
                  </form>
                   </td>
                  <td><form  action="/profil/supprimer" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="journaliste_id" type="hidden" value="{{$journaliste->id}}">
                  <button class="btn btn-dark">supprimer</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="pagination">{!!$journalistes->links()!!}</div>
      </div>
    </div>
@endsection