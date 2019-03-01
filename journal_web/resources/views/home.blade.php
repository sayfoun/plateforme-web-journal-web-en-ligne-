<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>Horizon Libre</title>
    <!-- Favicon  -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"  >
    <link rel="icon" href="/img/core-img/favicon.ico">
    <!-- Style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
<style type="text/css">


.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover {
    background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.contact {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

.content {
  margin-left: 75px;
  font-size: 30px;
}
</style>
<script type="text/javascript">
    
      $('.modal').on('show.bs.modal', function (e) {
    $('.modal .modal-dialog').attr('class', 'modal-dialog  flipInX  animated');
  })
  $('.modal').on('hide.bs.modal', function (e) {
    $('.modal .modal-dialog').attr('class', 'modal-dialog  flipOutX  animated');
  })
</script>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>



<div class="icon-bar">
<a href="#costumModal25"  class="contact" data-toggle="modal">
            <i class="fab fa-cuttlefish"></i>
        </a>
  
  <a href="www.facebook.com" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="https://www.facebook.com/" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="https://www.facebook.com/" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="https://www.facebook.com/" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>

    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand"  style="color:#F79F81; font-size: 30px;">Horizon Libre</a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/Accueil"><i class="fas fa-home" ></i>  Accueil </a>
                                </li>
                                @if(Auth::user()->journaliste)
                                <li class="nav-item">
                                    <a class="nav-link" href="/profil"><i class="fas fa-user"></i> Porfil</a>
                                </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Année</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php 
                                          $date_actuel=date('Y');
                                          $x=2018;
                                    ?>
                                  @for ($anne = $x; $anne < $date_actuel+1; $anne++)
                                    <form   action="/Accueil/Année/{{$anne}}" method="post"> 
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <input type="hidden" name="x" value="{{$anne}}">
                                        <button class="dropdown-item" >                                   
                                           {{ $anne }}
                                        </button>
                                    </form>     
                                   @endfor
                                        
                                        
                                    </div>
                                </li>
                                @if(Auth::user()->journaliste)
                                <li class="nav-item">
                                    <a class="nav-link" href="/profil/Message"><i class="fas fa-envelope"></i> Contact</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact"><i class="fas fa-envelope"></i> Contact</a>
                                </li>
                                @endif
                               

                                <li class="nav-item" data-toggle="modal" data-target="#exampleModal" >
                                    <a class="nav-link" href="#" ><img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:28px; height:28px;  top:10px; left:10px; border-radius:50%">   {{Auth::user()->name}}</a>
                                </li>
                                 <li class="nav-item"  data-toggle="modal" data-target="#myModal">
                                    <a class="nav-link" href="#"><i class="fas fa-camera-retro"></i></a>
                                </li>
                            </ul>
                            <!-- Search Form  -->
                            <div id="search-wrapper">

                                </form>
                                <form action="/Accueil/rechreche" method="get">
                              
                                    <input type="text" id="search" name="search" placeholder="sujet ,titre...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    

          <!-- Hero Slides Area -->
        <div class=" owl">
            <!-- Single Slide -->
            <div class="single-hero-slide "  style="background-color: #2A120A;">
                
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
   
    <div class="carousel-item active">
      <img class="d-block img-fluid"     
    style="height: 250px; width:100%;" src="bg2.jpg" alt="First slide">
    </div>

    <div class="carousel-item">
      <img class="d-block img-fluid" 
    style="height: 250px; width:100%;" src="bg3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" 
    style="height: 250px; width:100%;" src="bg4.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" 
    style="height: 250px; width:100%;" src="bg5.jpg" alt="Second slide">
    </div>

    <div class="carousel-item">
      <img class="d-block img-fluid" style="height: 250px; width:100%;" src="/logo/saif.png" alt="Third slide">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

            </div>
            <!-- Single Slide -->
            
        </div>


    <div class="main-content-wrapper" >
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="">
                    <div class="post-content-area ">
                        <!-- Catagory Area -->
                        <div class="world-catagory-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                
                            
                                <li class="nav-item" style="color:red;">
                                    <a class="nav-link active" id="tab1" href="/Accueil" role="tab" aria-controls="world-tab-1" aria-selected="true">tous</a>
                                </li>
                                
                                @foreach($category as $cat)
                                
                                <li class="nav-item">
                                @if ($loop->index==5) @break; @endif
                                    <form  action="/Accueil/{{$cat}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="x" value="{{$cat}}">

                                    <button class="nav-link"    role="tab"  aria-selected="false" style="border: none; background-color: white;">
                                    {{$cat}}
                                    </button>
                                    </form>
                                    
                                @endforeach
                                </li>

                                  
                                 
                               
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"  size="3" aria-haspopup="true" aria-expanded="false">categories</a>
                                    <div class="dropdown-menu">
                                    @foreach($category as $cat)
                                    @if($loop->index >5)
                                    <form  action="/Accueil/{{$cat}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="x" value="{{$cat}}">
                                    <button class="nav-link"    role="tab" aria-controls="world-tab-7"  >{{$cat}}
                                    </button>
                                    </form>
                                    @endif
                                     @endforeach
                                    </div>
                                </li>
                            </ul>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                    </div>
                </div>
            </div>
            <br><br>

  

        
        <div id="costumModal25" class="modal bounceInLeft" data-easein="perspectiveLeftIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">
                            <a href="#"  role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                         <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position: absolute; top:10px; left:10px; border-radius:50%">
                                         {{ Auth::user()->name }} {{ Auth::user()->last_name}}<span class="caret"></span>
                                         </a>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="card" style="background-color: #848484;" ><h3 style="padding-left: 28%; ">contact admin</h3></div>
       </br>
                 <div class="card">
                               @if ($errors->any())
                                      <div class="alert alert-danger">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                      </div>
                                       @endif


<br>
    
                                 <p>si vous avez des questions sur l'application ou vous avez des propositions d'amélioration de notre site, contacter l'administrateur,  </p>
                                   <form class="mbr-form" action="/profil/Message/store" method="post" data-form-title="Mobirise Form">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="row row-sm-offset">
                                  <div class="col-md-4 multi-horizontal" data-for="name">
                                  <div class="form-group">
                                  <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Sujet</label>
                                  <input type="text" class="form-control" name="sujet" data-form-field="Name" required="" style="padding-left: 28%;" id="name-form1-4t" >
                                  </div>
                                  </div>
                                  </div>
                                  <div class="form-group" data-for="message">
                                <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Message</label>
                                <textarea type="text" class="form-control" name="message" required="" rows="7" data-form-field="Message" id="message-form1-4t"></textarea>
                                </div>
                                <span class="input-group-btn">
                                <button href="" type="submit" class="btn btn-primary btn-form display-4">Envoye</button>
                                </span>
                               </form>
                               @if(Auth::user()->journaliste==0)
                                <p> si vous voulez avoir les droits d'écriture,  ...  <a data-toggle="modal" data-target="#exampleModalCenter" style="color:red;">
                                Cliquez ici</a>
                                </p>
                                @endif
                                

                                                          
              </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Close
                        </button>
                        <button class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>




 <div class="main-content-wrapper" >
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                   
                            
                                  <ul class="pagination">
                                    <li >{!!$articles->links()!!}</li>
                                  </ul>

                    
             </div>
             </div>
        </div>
</div>
                                    


 
            <div class="world-latest-articles">

                <div class="row">

                    <div class="col-12 col-lg-8">
                       
                 
                   

                        <!-- Single Blog Post -->
                        @foreach($articles as $article)
                        
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
                                    <p><a href="#" class="post-author">publié </a> à <a href="#" class="post-date" style="color:red;">{{$article->created_at}}</a></p>                        
                                </div>
                                <div class="post-meta">
                                  
                                   <p><a href="#" class="post-author">
                                  <i class="far fa-thumbs-up"></i><span  > 
                                    {{ DB::table('likes')->where('like',1)->where('post_id', $article->id)->count()}} </span>

                                    <i class="fas fa-thumbs-down"></i>
                                      <span > 
                                    {{ DB::table('likes')->where('like',0)->where('post_id', $article->id)->count()}} </span>

                               
                                <i class="fas fa-exclamation-circle"></i>
                                <span  > 
                                    {{ DB::table('singales')->where('post_id', $article->id)->count()}} </span>
                                    </a></p>

                                    
                                    <div style="margin-left: 80%;">
                                    <form method="post" action="/Accueil/lire/{{$article->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="post_id" value="{{$article->id}}">
                                    <button class="btn "  style="background-color: #B43104;" type="submit"  >
                                    lire la suite
                                    </button> 
                                    </form>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                       @endforeach
                       

                        
                                        <div class="row justify-content-center">
                                        
                                            @foreach($image as $article)
                                            
                                            
                                                  <div class="col-12 col-md-6 col-lg-4">
                                                      <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                                                       
                                                          <div class="post-thumbnail">
                                                              <img src="/uploads/post_image/{{$article->image}}" style="width: 430px; height: 300px;" alt="">
                                                          
                                                              <div class="post-content d-flex align-items-center justify-content-between">
                                                                  
                                                                  <div class="post-tag"><a href="#">{{$article->titre}}</a></div>
                                                                 
                                                                  <a href="#" class="headline">
                                                                      <h5>{{$article->sujet}}</h5>
                                                                  </a>
                                                                 
                                                                  <div class="post-meta">
                                                                      <p><a href="#" class="post-author">publié</a> à <a href="#" class="post-date">{{$article->created_at}}</a></p>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                          
                                          @endforeach
                                            
                                        </div>
 </div>


                                <div class="col-12 col-lg-4">
                                
                                    <div class="title">
                                        <h5 style="float:50px;">Nouveau video </h5>
                                    </div>
                                    @foreach($video as $article)
                                    
                                    <div class="single-blog-post wow " data-wow-delay="0.4s">
                                        <!-- Post Thumbnail -->
                                              <div class="post-thumbnail">
                                                  
                                                  {!! LaravelVideoEmbed :: parse ( $article->video ) !!}
                                                 
                                              </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                            <a href="#" class="headline">
                                                            <h3>{{$article->titre}}</h3>
                                                                <h5>{{$article->sujet}}</h5>
                                                            </a>
                                                            
                                                            <div class="post-meta">
                                                                <p><a href="#" class="post-author">publié</a> à <a href="#" class="post-date">{{$article->created_at}}</a></p>
                                                            </div>
                                                </div>
                                    </div>

                                  

                                   @endforeach
                                </div>
</div>
</div>
</div>

    <!-- modal change avatar-->
    <!-- The Modal -->
    
<div class="modal" id="myModal" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="my-auto">
            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ Auth::user()->name }}'s Profil</h2>
            <form enctype="multipart/form-data" action="/profil/changeavatar" method="POST">
                <label><h3>Modifier le photo de profil</h3>
                </label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>

</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>

    </div>
  </div>
</div>
<

<!--modal deconncte-->

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered " role="document " >
                        <div class="modal-content">
             
                                  <div class="model-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                         <a href="#"  role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                         <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position: absolute; top:10px; left:10px; border-radius:50%">
                                         {{ Auth::user()->name }} {{ Auth::user()->last_name}}<span class="caret"></span>
                                         </a>
                                    </h5>
                      
                          </div>
                        <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à terminer votre session en cours..</div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                                 <a  class="btn btn-primary" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                           Connectez - Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                      </div>
          
               </div>


      </div>
      </div>
    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <a href="#"><img src="/logo/saif.png" style="height: 50px; width:60%;" alt=""></a>
                        <div class="copywrite-text mt-30">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; {{$x}} droits réservés | Ce modèle est fait avec <i class="fa fa-heart-o" aria-hidden="true"></i> par  saif eddin hajji</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <ul class="footer-menu d-flex justify-content-between">
                            <li><a href="/Accueil">Accueil</a></li>
                            @if(Auth::user()->journaliste=1)
                            <li><a href="/profil/Message">Contact</a></li>
                            @else
                            
                            <li><a href="/contact">Contact</a></li>
                            @endif
                            <li><a href="/profil">Profil</a></li>
                            <li><a href="/Accueil">infos</a></li>    
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <h5>Recherche</h5>
                        <form action="/Accueil/rechreche" method="get">
                              <input type="text" style="resize: 100px;" name="search"  placeholder="infos">
                              <button type="submit"><i class="fa fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/img/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/img/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/img/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/img/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/img/js/active.js"></script>

</body>

</html>
