<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Horizon Libre</title>
    <!-- Styles -->

    <!-- Bootstrap core CSS -->
    <link href="http://localhost:8000/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="http://localhost:8000/vendor/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   
    <link href="http://localhost:8000/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="http://localhost:8000/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="http://localhost:8000/css/resume.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

    <style media="screen">

    .marginner{
      margin-top:20px;
    }
      .menu{
        z-index: 10000;
        position:fixed;
        width: 100%;
        padding: 10px;
        background-color: black;

      }

      a.nava{
        text-decoration: none;
        color:white;
        padding: 10px;
        font-size: 20px;
        display: inline-block;
        margin-left: 20px;
      }

      .search{
        direction: ltr;
      }
    </style>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="sideNav" style="background-color: black;" >
    <img src="/logo/saif.png" style="width: 200px;">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">

      <span class="d-none d-lg-block">
        <a href="/profil/change-Img">
        <img class="img-fluid img-profile img-rounded" class="profilePic img " alt="photo de profil" src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 150px; height: 200px;    -webkit-border-radius:100px;
    ">
      </a></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">{{Auth::user()->name}}</a>
        </li>
        <li class="nav-item">

            @if(Auth::user()->journaliste==1)
          <a class="nav-link js-scroll-trigger" href="/profil/create"><i class="fas fa-newspaper"></i> Ajouter un Article </a>
           @endif
        </li>
        <li >
            @if(Auth::user()->journaliste==1)
          <a class="nav-link js-scroll-trigger" href="/profil/create"><i class="far fa-bell"></i> Notification </a>
           @endif
        </li>
        
        
            <a class="nav-link js-scroll-trigger" href="/profil/Message"><i class="fas fa-envelope-square"></i> Contact admin </a>
          </li><li class="nav-item">
          <a class="nav-link js-scroll-trigger "  href="/profil/edit">  <i class="fas fa-cogs"></i> Edit</a>
        </li>
       
        
        <li class="nav-item">
   <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Déconnexion</a>

        </li>
      </ul>
    </div>
  </nav>
 
    <div id="app" >
      <div class="menu " >
        
        <a href="/Accueil" class="nava"><i class="fas fa-home" ></i> Accueil</a>
        <a href="/profil" class="nava"><i class="fas fa-user"></i> Profil</a>
        <a href="/profil" class="nava"><i class="fas fa-newspaper"></i>  tendence</a>


   



        <a href="#" class="nava">
        <form class="form-inline my-2 my-lg-0" action="/profil/search" method="get">
      <input class="form-control mr-sm-2" name="search" style="margin-left:300px" type="text" placeholder="Search" required="">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
        </a>
      </div>

    </div>
 <!-- Connectez -Connectez - Out Modal-->
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

@yield('sayfoun')
;
    <script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <!-- Plugin JavaScript -->
    <script src="http://localhost:8000/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="http://localhost:8000/js/resume.min.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script type="text/javascript">
        CKEDITOR.replace('article-ckeditor');
</script>

</body>
</html>
