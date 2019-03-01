<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Adminstration</title>
  <!-- Bootstrap core CSS-->
  {{!!Html::style('/vendor/admin/vendor/bootstrap/css/bootstrap.min.css')!!}}
  <!-- Custom fonts for this template-->
  {{!!Html::style('/vendor/admin/vendor/font-awesome/css/font-awesome.min.css')!!}}
  <!-- Page level plugin CSS-->
  {{!!Html::style('/vendor/admin/vendor/datatables/dataTables.bootstrap4.css')!!}}
  <!-- Custom styles for this template-->
  {{!!Html::style('/vendor/admin/css/sb-admin.css')!!}}
  <link href="/index/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"  >
 </head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">            
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     <span> <img src="/logo/saif.png" style="width:200px; height:70px; float:left; border-radius:3%; margin-right:0px; padding-bottom: 2%;"></span>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/profil">
            <img src="/uploads/avatars/{{ Auth::user()->avatar }}"  style="width:120px; padding-bottom: 10%; height:110px; padding-left: 10%; border-radius:3%; margin-right:25px;" alt="Cinque Terre">
            <a class="navbar-brand" style="padding-left:65px" href="#">{{Auth::user()->name}}</a>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="far fa-database"></i>
            <span class="nav-link-text">base de donnees</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html"><i class="fal fa-table"></i>table</a>
            </li>
            <li>
              <a href="/profil/cadres">Cards</a>
            </li>
          </ul>
        </li>
       <i class="fal fa-table"></i>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#user" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">utlisateurs</span>
          </a>
          <ul class="sidenav-second-level collapse" id="user" >
            <li>
              <a href="/profil/utlisateurs">utlisateurs simple</a>
            </li>
            <li>
              <a href="/profil/journalistes">journalistes</a>
            </li>
            <li>
              <a href="/profil/cadres">Statique</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>

            <span class="nav-link-text"> les articles</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
              <a href="/profil/articles_supprimer">les articles supprimer</a>
              </li>
            <li>
              <a href="/profil/articles"> les articles</a>
            </li>
            <li>
              <a href="/profil/articles/signalés"> les articles signalés</a>
              
            </li>
            
            
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" href="/profil/demande">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Demander le droit d'écrire</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="https://www.youtube.com">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">lien youtube</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler" href="/Accueil">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 
            <i class="fa fa-fw fa-envelope"></i>

            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">{{DB::table('messages')->count()}} New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle">{{DB::table('messages')->count()}}</i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">{{DB::table('messages')->count()}} messages:</h6>
             <div class="dropdown-divider"></div>
           
            <a class="dropdown-item small" href="/profil/messages">Voir tous les messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">

          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">

            <i class="fa fa-fw fa-sign-out"></i>Déconnexion</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">{{Auth::user()->name}}</a>
        </li>
        <li class="breadcrumb-item active">compte admin</li>
      </ol>
       <!-- Connectez -Connectez - Out Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <a href="#"  role="button" aria-expanded="false" style="">
          <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px;   left:10px; border-radius:50%">
    {{ Auth::user()->name }} {{ Auth::user()->last_name}}<span class="caret"></span>
</a></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
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

    @yield('amal')
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/vendor/admin/vendor/chart.js/Chart.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="/vendor/admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="/vendor/admin/js/sb-admin-datatables.min.js"></script>
    <script src="/admin/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
