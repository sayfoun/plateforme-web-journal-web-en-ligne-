@extends('admin.admin')
@section('amal')
      <div class="card mb-3">
      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
      @endif
        <div class="card-header">
                      <i class="fa fa-table"></i> database::journalistes</div>
                        
                        

        @if($articles->isEmpty())
      
        <a style="color: blue; position: center; size: 40px; font-size:60px; font-style: italic; text-align: left; position: static;
    position: relative;">aucun articles</a>
    </div>
        @else

                   
                       <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="/profil/rechreche/articles">
                       <div class="input-group">
                            <input class="form-control" name="search" type="text" placeholder="Search for..." required="" >
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
                          <td>N°</td>
                          <td>ID article</td>
                          <td>nom de journaliste</td>
                          <td>catégorie</td>
                          <td>Titre</td>
                          <td>Type</td>
                          <td>Signaler</td>
                          <td>récupérer</td> 
                          <td>Supprimer</td>
                        </tr>

                    @foreach($articles as $article)
                  <tr>
                      <td>{{$loop->index+1}}</td>

                      <td>{{$article->id}}</td>

                      <td> {{DB::table('users')->whereid($article->user_id)->value('name')}}</td>

                      <td>{{$article->category}}</td>

                      <td>{{$article->titre}}</td>

                      <td>
                  @php
                  $type="";
                  if(!($article->description == ''))
                    $type="text";
                    elseif(!($article->image == ''))
                    {
                    
                    $type="image";
                    }
                    else
                    {
                    $type="video";
                    }
                    
                  @endphp

                    {{$type}}
                    

                  </td>


                  <td>en cours</td>
<td>
<form  action="/profil/articles_soft/{{$article->id}}/recuperer" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="post_id" type="hidden" value="{{$article->id}}">
                  <button type="submit" class="btn btn-success">récupérer</button>
                  </form>
                  <td> 
                <form  action="/profil/articles_soft/{{$article->id}}/supprimer" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="post_id" type="hidden" value="{{$article->id}}">
                  <button class="btn btn-danger">supprimer</button>
                
                  </form>
                   </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="pagination">{!!$articles->links()!!}</div>
      </div>
      
    </div>
    @endif
@endsection