 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Horizon Libre</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="/index/styleapp.css" rel="stylesheet"  >
        <link href="/index/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"  >

</head>
<body >
<div id="app" >
    <nav class="navbar navbar-default navbar-static-top" style="background-color: #000;">
        <div style="">

            <div class="navbar-header " >

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" style="">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" >
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right headerleft
                " style = " font-family: Ubuntu ;  padding: -2px; font-size: 14px;
                        text-decoration: none;     fon
                        line-height: 1.42857143;
                        color: #333; ">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="item5"><a href="{{ route('login') }}" class="item5" style="color: #F2F7F7;"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        <li class="item6"><a href="{{ route('register') }}" class="item6" style="color: #F2F7F7;"><i class="fas fa-user-plus"></i> S'inscrire</a></li>
                    

   
    
    
                    @endif
                </ul>

            </div>
             @yield('content')
        </div>

    </nav>

    


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
