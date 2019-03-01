@extends('entete')
@section('sayfoun')
<!-- Single Blog Post -->
                      
                        <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                          
                            <div class="post-thumbnail">
                               
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                            <img class="rounded-circle avatar" src="/uploads/avatars/{{DB::table('users')->where('id','=',$article->user_id)->value('avatar') }}"  alt="{{DB::table('users')->where('id','=',$article->user_id)->value('name') }}">  {{DB::table('users')->where('id','=',$article->user_id)->value('name') }}
                                <a href="#" class="headline">
                              <h3>{{$article->titre}}</h3>
                                    <h5>{{$article->sujet}}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">publié </a> à <a href="#" class="post-date" style="color:red;">{{$article->created_at}}</a>                        
                                </div>
                                <div class="post-meta">
                                  
                                   <p><a href="#" class="post-author">
                                  <i class="far fa-thumbs-up"></i><span  > 
                                    {{ DB::table('likes')->where('like',1)->where('post_id', $article->id)->count()}} </span>

                                    <i class="fas fa-thumbs-down"></i>
                                      <span > 
                                    {{ DB::table('likes')->where('like',0)->where('post_id', $article->id)->count()}} </span>

                               
                                <i class="fas fa-exclamation-circle"></i><span  > 
                                    {{ DB::table('singales')->where('post_id', $article->id)->count()}} </span>
                                    </a></p>
                                    </a>

                                    <form method="post" action="/Accueil/lire/{{$article->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="post_id" value="{{$article->id}}">
                                    <button class="btn btn-primary"    style="float:right;">
                                    lire la suite
                                    </button> 
                                    
                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                       </

@endsection