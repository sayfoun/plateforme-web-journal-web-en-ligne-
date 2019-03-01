
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
    <link href="http://localhost:8000/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"  >
    <link rel="icon" href="/img/core-img/favicon.ico">
    <!-- Style CSS -->
    <link rel="stylesheet" href="http://localhost:8000/style.css">

</head>

<body>
    <!-- Preloader Start -
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    Preloader End -->
    

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
                                
                                @if(Auth::user()->journlaiste)
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
    style="height: 250px; width:100%;" src="/bg2.jpg" alt="First slide">
    </div>

    <div class="carousel-item">
      <img class="d-block img-fluid" 
    style="height: 250px; width:100%;" src="/bg3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" 
    style="height: 250px; width:100%;" src="/bg4.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" 
    style="height: 250px; width:100%;" src="/bg5.jpg" alt="Second slide">
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




    <div class="main-content-wrapper" style=" ">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area ">
                        <!-- Catagory Area -->
                        <div class="world-catagory-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                

                                <li class="nav-item" style="color:red;">
                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="/Accueil" role="tab" aria-controls="world-tab-1" aria-selected="true">tous</a>
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

         <br><br>
 

   @yield('page')

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
</body>
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


    </footer> 
    <!-- ***** Footer Area End ***** -->

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


</html>